<?php

namespace App\Http\Controllers;

use App\Models\Fabricante;
use App\Models\Produto;
use Illuminate\Http\Request;

class FabricanteController extends Controller
{

    /**
     * FabricanteController constructor.
     */
    public function __construct()
    {
        $this->middleware('permission:fabricante-list|fabricante-create|fabricante-edit|fabricante-delete', ['only' => ['index']]);
        $this->middleware('permission:fabricante-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:fabricante-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:fabricante-delete', ['only' => ['destroy']]);
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
            $fabricantes = Fabricante::where('nome', 'LIKE', '%' . $busca . '%')
                ->orderBy('nome', 'ASC')->paginate(8)->appends('search', $busca);
        }else {
            $fabricantes = Fabricante::orderBy('nome', 'ASC')->paginate(8);
        }
        return view('fabricantes.index', compact('fabricantes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
            return view('fabricantes.create');
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
            'nome' => 'required|unique:fabricantes,nome',
        ]);

        Fabricante::create($request->all());
        if (session('voltar')) {
            if (session('id')) {
                return redirect()->route(session('voltar'),session('id'));
            } else {
                return redirect()->route(session('voltar'));
            }
        } else {
            return redirect()->route('fabricantes.index')->with('success', 'Fabricante criada com sucesso!!');
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $fabricante = Fabricante::findOrFail($id);

        return view('fabricantes.edit', compact('fabricante'));
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
            'nome' => 'required|unique:fabricantes,nome,'.$id
        ]);

        $data = Fabricante::findOrFail($id);
        $data->update($request->all());

        return redirect()->route('fabricantes.index')->with('success', 'Fabricante alterada com sucesso!!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $produto = Produto::where('fabricante_id',$id)->get();
        if(count($produto)>0){
            return redirect()->route('produtos.index',['achei'=>$id])->with('alert', "Existe produtos com essa fabricante registrado. <br> Exclua o produto ou troque o fabricante dele antes de excluir a FABRICANTE!!!");
        }else{
            $fabricante = Fabricante::findOrFail($id);
            $fabricante->delete();
            return redirect()->route('fabricantes.index')->with('success', 'Fabricante deletada com successo!!!');
        }
    }
}
