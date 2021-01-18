<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:client-list|client-create|client-edit|client-delete', ['only' => ['index']]);
        $this->middleware('permission:client-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:client-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:client-delete', ['only' => ['destroy']]);
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
            $clients = Client::where('nome','LIKE','%'.$busca.'%')
                ->orWhere('nomefantasia','LIKE','%'.$busca.'%')
                ->orWhere('razaosocial','LIKE','%'.$busca.'%')
                ->orWhere('cpf','LIKE','%'.$busca.'%')
                ->orWhere('cnpj','LIKE','%'.$busca.'%')
                ->orderBy('id', 'DESC')->paginate(5)->appends('search',$busca);
        } else {
            $clients = Client::orderBy('id', 'DESC')->paginate(10);
        }
        return view('clients.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clients.create');
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
            'nome' => 'exclude_if:pessoa,"Juridica"|required',
            'nomefantasia' => 'exclude_if:pessoa,"Fisica"|required',
            'cpf' => 'nullable|cpf|formato_cpf|unique:clients,cpf',
            'cnpj' => 'nullable|cnpj|formato_cnpj|unique:clients,cnpj',
            'fixo' => 'required_without:celular,whatsapp,email',
            'celular' => 'required_without:fixo,whatsapp,email',
            'whatsapp' => 'required_without:fixo,celular,email',
            'email' => 'required_without:fixo,celular,whatsapp|email',
        ]);

//        dd($request->all());
        $cliente = Client::create($request->all());
        if($cliente) {
            return redirect()->route('clientes.index')->with('success', 'Adicionado com sucesso!!');
        }else {
            return redirect()->route('clientes.index')->with('error', 'Não foi posível adicionar!!');
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
        $data = Client::findOrFail($id);
        return view('clients.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Client::findOrFail($id);

        return view('clients.edit',compact('data'));
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
            'nome' => 'exclude_if:pessoa,"Juridica"|required',
            'nomefantasia' => 'exclude_if:pessoa,"Fisica"|required',
            'cpf' => 'nullable|cpf|formato_cpf|unique:clients,cpf,'.$id,
            'cnpj' => 'nullable|cnpj|formato_cnpj|unique:clients,cnpj,'.$id,
            'fixo' => 'required_without:celular,whatsapp,email',
            'celular' => 'required_without:fixo,whatsapp,email',
            'whatsapp' => 'required_without:fixo,celular,email',
            'email' => 'required_without:fixo,celular,whatsapp|email',
        ]);

//        dd($request->all());
        $data = Client::findOrFail($id);
        $cliente = $data->update($request->all());
        if($cliente) {
            return redirect()->route('clientes.index')->with('success', 'Atualizado com sucesso!!');
        }else {
            return redirect()->route('clientes.index')->with('error', 'Não foi posível atualizar!!');
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
        $cliente = Client::findOrFail($id)->delete();
        if($cliente) {
            return redirect()->route('clientes.index')->with('success', 'Deletado com sucesso!!');
        }else {
            return redirect()->route('clientes.index')->with('error', 'Não foi posível Deletar!!');
        }
    }
}
