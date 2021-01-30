<?php

namespace App\Http\Controllers;

use App\Models\Fabricante;
use App\Models\Fornecedor;
use App\Models\Produto;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:produto-list|produto-create|produto-edit|produto-delete', ['only' => ['index']]);
        $this->middleware('permission:produto-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:produto-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:produto-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->has('search')) {
            $busca = $request->search;
            $produtos = Produto::where('nome', 'LIKE', '%' . $busca . '%')
                ->orWhere('condicao', 'LIKE', '%' . $busca . '%')
                ->orderBy('nome', 'ASC')->paginate(8)->appends('search', $busca);
        } else {
            $produtos = Produto::orderBy('nome', 'ASC')->paginate(8);
        }
        return view('produtos.index', compact('produtos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        session(['voltar' => request()->route()->getName()]);

        $fabricantes = Fabricante::orderBy('nome','ASC')->get();
        $fornecedores = Fornecedor::orderBy('nomefantasia','ASC')->get();
        return view('produtos.create', compact('fabricantes', 'fornecedores'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nome' => 'required',
            'condicao' => 'required',
            'valor_custo' => 'required',
            'valor_final' => 'required',
            'perc_lucro' => 'required',
            'fabricante_id' => 'required',
            'fornecedor_id' => 'required',
        ]);

        $request["valor_custo"] = str_replace (',', '.', str_replace ('.', '', $request->valor_custo));
        $request["perc_lucro"] = str_replace (',', '.', str_replace ('.', '', $request->perc_lucro));
        $request["valor_final"] = str_replace (',', '.', str_replace ('.', '', $request->valor_final));

        Produto::create($request->all());

        return redirect()->route('produtos.index')->with('success', 'Produto criado com sucesso!!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        session(['voltar' => request()->route()->getName(),'id' => $id]);

        $fabricantes = Fabricante::orderBy('nome','ASC')->get();
        $fornecedores = Fornecedor::orderBy('nomefantasia','ASC')->get();
        $row = Produto::findOrFail($id);

        return view('produtos.edit', compact('row', 'fabricantes', 'fornecedores'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nome' => 'required',
            'condicao' => 'required',
            'valor_custo' => 'required',
            'valor_final' => 'required',
            'perc_lucro' => 'required',
            'fabricante_id' => 'required',
            'fornecedor_id' => 'required',
        ]);

        $request["valor_custo"] = str_replace (',', '.', str_replace ('.', '', $request->valor_custo));
        $request["perc_lucro"] = str_replace (',', '.', str_replace ('.', '', $request->perc_lucro));
        $request["valor_final"] = str_replace (',', '.', str_replace ('.', '', $request->valor_final));

        $data = Produto::findOrFail($id);
        $data->update($request->all());

        return redirect()->route('produtos.index')->with('success', 'Produto alterado com sucesso!!!');
    }

    public function show($id)
    {
        $row = Produto::findOrFail($id);
        return view('produtos.show',compact('row'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $produto = Produto::findOrFail($id);
        $produto->delete();
        return redirect()->route('produtos.index')->with('success', 'Produto deletado com successo!!!');
    }


    /**
     * @param int $id
     * @param boolean $status
     * @return \Illuminate\Http\RedirectResponse
     */
    public function status($id, $status)
    {
        try {
            $row = Produto::findOrFail($id);

            $action = $row->update(['status' => !$status]);

            if ($action) {
                return redirect()->route('produtos.index')->with('success', 'STATUS do PRODUTO atualizado com sucesso!');
            } else {
                return redirect()->route('produtos.index')->with('error', 'Não foi possível atualiza STATUS do PRODUTO!');
            }

        } catch (ModelNotFoundException $e) {
            return redirect()->route('produtos.index')->with('error', 'Não foi possível encontrar o produtoo!');
        }
    }
}
