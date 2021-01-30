<?php

namespace App\Http\Controllers;

use App\Models\Fornecedor;
use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:fornecedor-list|fornecedor-create|fornecedor-edit|fornecedor-delete', ['only' => ['index']]);
        $this->middleware('permission:fornecedor-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:fornecedor-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:fornecedor-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        session()->forget(['voltar','id']);

        if ($request->has('search')) {
            $busca = $request->search;
            $fornecedors = Fornecedor::where('contato','LIKE','%'.$busca.'%')
                ->orWhere('nomefantasia','LIKE','%'.$busca.'%')
                ->orWhere('razaosocial','LIKE','%'.$busca.'%')
                ->orWhere('cnpj','LIKE','%'.$busca.'%')
                ->orWhere('skype','LIKE','%'.$busca.'%')
                ->orderBy('id', 'DESC')->paginate(5)->appends('search',$busca);
        } else {
            $fornecedors = Fornecedor::orderBy('id', 'DESC')->paginate(10);
        }
        return view('fornecedors.index', compact('fornecedors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
            return view('fornecedors.create');
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
            'contato' => 'required',
            'razaosocial' => 'required_without:nomefantasia',
            'nomefantasia' => 'required_without:razaosocial',
            'cnpj' => 'nullable|cnpj|formato_cnpj|unique:fornecedors,cnpj',
            'fixo' => 'required_without_all:celular,whatsapp,email',
            'celular' => 'required_without_all:fixo,whatsapp,email',
            'whatsapp' => 'required_without_all:fixo,celular,email',
            'email' => 'required_without_all:fixo,celular,whatsapp|email',
        ]);

        $fornecedore = Fornecedor::create($request->all());

        if (session('voltar')) {
            if (session('id')) {
                return redirect()->route(session('voltar'),session('id'));
            } else {
                return redirect()->route(session('voltar'));
            }
        } else {

            if ($fornecedore) {
                return redirect()->route('fornecedores.index')->with('success', 'Adicionado com sucesso!!');
            } else {
                return redirect()->route('fornecedores.index')->with('error', 'Não foi posível adicionar!!');
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Fornecedor::findOrFail($id);
        return view('fornecedors.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Fornecedor::findOrFail($id);

        return view('fornecedors.edit',compact('data'));
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
            'contato' => 'required',
            'razaosocial' => 'required_without:nomefantasia',
            'nomefantasia' => 'required_without:razaosocial',
            'cnpj' => 'nullable|cnpj|formato_cnpj|unique:fornecedors,cnpj,'.$id,
            'fixo' => 'required_without_all:celular,whatsapp,email',
            'celular' => 'required_without_all:fixo,whatsapp,email',
            'whatsapp' => 'required_without_all:fixo,celular,email',
            'email' => 'required_without_all:fixo,celular,whatsapp|email',
        ]);

//        dd($request->all());
        $data = Fornecedor::findOrFail($id);
        $fornecedore = $data->update($request->all());
        if($fornecedore) {
            return redirect()->route('fornecedores.index')->with('success', 'Atualizado com sucesso!!');
        }else {
            return redirect()->route('fornecedores.index')->with('error', 'Não foi posível atualizar!!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $fornecedor = Fornecedor::findOrFail($id)->delete();
        if($fornecedor) {
            return redirect()->route('fornecedores.index')->with('success', 'Deletado com sucesso!!');
        }else {
            return redirect()->route('fornecedores.index')->with('error', 'Não foi posível Deletar!!');
        }
    }
}
