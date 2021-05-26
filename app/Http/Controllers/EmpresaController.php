<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use App\Models\Empresa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class EmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('empresa.index', ['empresas' => Empresa::paginate(10)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('empresa.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'direccion' => 'string',
            'sitioWeb' => 'URL',
            'correo' => 'email',
            'logotipo' => 'image|dimensions:min_width=100,min_height=100'
        ]);

        $empresa = new Empresa;

        $empresa->nombre = $request->input('nombre');
        $empresa->direccion = $request->input('direccion');
        $empresa->sitioWeb = $request->input('sitioWeb');
        $empresa->correo = $request->input('correo');

        if ($request->hasFile('logotipo')) $empresa->logotipo = $request->file('logotipo')->store('images', 'public');

        $empresa->save();

        return redirect()->route('indexEmpresa');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('empresa.show', ['empresa' => Empresa::findOrFail($id), 'empleados' => Empleado::where('empresa_id', $id)->get()]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('empresa.edit', ['empresa' => Empresa::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required',
            'direccion' => 'string',
            'sitioWeb' => 'URL',
            'correo' => 'email',
            'logotipo' => 'image|dimensions:min_width=100,min_height=100'
        ]);

        $empresa = Empresa::findOrFail($id);

        $empresa->nombre = $request->input('nombre');
        $empresa->direccion = $request->input('direccion');
        $empresa->sitioWeb = $request->input('sitioWeb');
        $empresa->correo = $request->input('correo');

        if ($request->hasFile('logotipo')) {
            Storage::delete('public/' . $empresa->logotipo);

            $empresa->logotipo = $request->file('logotipo')->store('images', 'public');
        }

        $empresa->save();

        return redirect()->route('indexEmpresa');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $empresa = Empresa::findOrFail($id);

        if (Storage::delete('public/' . $empresa->logotipo)) {
            $empresa->delete();
        }

        return redirect()->route('indexEmpresa');
    }
}
