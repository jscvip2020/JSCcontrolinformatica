<?php

namespace App\Http\Controllers;

use App\Models\Equipamento;
use App\Models\Marca;
use Illuminate\Http\Request;

class MarcaController extends Controller
{
    /**
     * MarcaController constructor.
     */
    function __construct()
    {
        $this->middleware('permission:marca-list|marca-create|marca-edit|marca-delete', ['only' => ['index']]);
        $this->middleware('permission:marca-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:marca-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:marca-delete', ['only' => ['destroy']]);
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
            $marcas = Marca::where('nome', 'LIKE', '%' . $busca . '%')
                ->orderBy('id', 'DESC')->paginate(8)->appends('search', $busca);
        } else {
            $marcas = Marca::orderBy('id', 'DESC')->paginate(8);
        }
        return view('marcas.index', compact('marcas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('marcas.create');
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
            'nome' => 'required|unique:marcas,nome',
        ]);

        Marca::create($request->all());


        if (session('voltar')) {
            if (session('id')) {
                return redirect()->route(session('voltar'),session('id'));
            } else {
                return redirect()->route(session('voltar'));
            }
        } else {
            return redirect()->route('marcas.index')->with('success', 'Marca criada com sucesso!!');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $marca = Marca::findOrFail($id);

        return view('marcas.edit', compact('marca'));
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
            'nome' => 'required|unique:marcas,nome,' . $id
        ]);

        $data = Marca::findOrFail($id);
        $data->update($request->all());

        return redirect()->route('marcas.index')->with('success', 'Marca alterada com sucesso!!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $equipamento = Equipamento::where('marca_id', $id)->get();
        if (count($equipamento) > 0) {
            return redirect()->route('equipamentos.index', ['achei' => $id])->with('alert', "Existe equipamentos com essa marca registrado. <br> Exclua o equipamento ou troque a marca dele antes de excluir a MARCA!!!");
        } else {
            $marca = Marca::findOrFail($id);
            $marca->delete();
            return redirect()->route('marcas.index')->with('success', 'Marca deletada com successo!!!');
        }
    }
}
