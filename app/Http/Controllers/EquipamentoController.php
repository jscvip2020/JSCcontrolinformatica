<?php

namespace App\Http\Controllers;

use App\Models\Equipamento;
use App\Models\Marca;
use Illuminate\Http\Request;

class EquipamentoController extends Controller
{
    /**
     * EquipamentoController constructor.
     */
    public function __construct()
    {
        $this->middleware('permission:equipamento-list|equipamento-create|equipamento-edit|equipamento-delete', ['only' => ['index']]);
        $this->middleware('permission:equipamento-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:equipamento-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:equipamento-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->has('marca')) {
            $busca = $request->marca;
            $rows = Equipamento::where('marca_id', $busca)
                ->orderBy('id', 'DESC')->paginate(8)->appends('marca', $busca);
        }
        elseif ($request->has('search')) {
            $busca = $request->search;
            $rows = Equipamento::where('nome', 'LIKE', '%' . $busca . '%')
                ->orWhere('modelo', 'LIKE', '%' . $busca . '%')
                ->orderBy('id', 'DESC')->paginate(8)->appends('search', $busca);
        }else {
            $rows = Equipamento::orderBy('id', 'DESC')->paginate(8);
        }
        return view('equipamentos.index', compact('rows'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $marcas = Marca::all();
        if($marcas){
            return view('equipamentos.create', compact('marcas'));
        }else {
            return view('equipamentos.create');
        }
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
            'marca_id' => 'required',
            'nome' => 'required',
        ]);

        Equipamento::create($request->all());

        return redirect()->route('equipamentos.index')->with('success', 'Equipamento criado com sucesso!!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $marcas = Marca::all();
        $row = Equipamento::findOrFail($id);
        if($marcas){
            return view('equipamentos.edit', compact('row','marcas'));
        }else {
            return view('equipamentos.edit');
        }
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
            'marca_id' => 'required',
            'nome' => 'required',
        ]);

        $data = Equipamento::findOrFail($id);
        $data->update($request->all());

        return redirect()->route('equipamentos.index')->with('success', 'Equipamento atualizado com sucesso!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Equipamento::findOrFail($id);
        $data->delete();
        return redirect()->route('equipamentos.index')->with('success', 'Equipamento deletado com successo!!!');
    }
}
