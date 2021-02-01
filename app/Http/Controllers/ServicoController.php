<?php

namespace App\Http\Controllers;

use App\Models\Servico;
use Illuminate\Http\Request;

class ServicoController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:servico-list|servico-create|servico-edit|servico-delete', ['only' => ['index']]);
        $this->middleware('permission:servico-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:servico-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:servico-delete', ['only' => ['destroy']]);
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
            $servicos = Servico::where('nome','LIKE','%'.$busca.'%')
                ->orderBy('id', 'DESC')->paginate(5)->appends('search',$busca);
        } else {
            $servicos = Servico::orderBy('id', 'DESC')->paginate(5);
        }
        return view('servicos.create', compact('servicos'));
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
            'servico' => 'required|unique:servicos,servico',
            'valor' => 'required',
        ]);

        $request["valor"] = str_replace (',', '.', str_replace ('.', '', $request->valor));
        $data = Servico::create($request->all());
        if($data) {
            return redirect()->route('servicos.index')->with('success', 'Adicionado com sucesso!!');
        }else {
            return redirect()->route('servicos.index')->with('error', 'Não foi posível adicionar!!');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Servico  $servico
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $servicos = Servico::orderBy('id', 'DESC')->paginate(5);
        $row = Servico::findOrFail($id);
        return view('servicos.edit', compact('row', 'servicos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Models\Servico $servico
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
                    'servico' => 'required|unique:servicos,servico,'.$id,
                    'valor' => 'required',
                ]);
        $data = Servico::findOrFail($id);
        $request["valor"] = str_replace (',', '.', str_replace ('.', '', $request->valor));
        $data = $data->update($request->all());
        if($data) {
            return redirect()->route('servicos.index')->with('success', 'Editado com sucesso!!');
        }else {
            return redirect()->route('servicos.index')->with('error', 'Não foi posível Editar!!');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Servico  $servico
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
