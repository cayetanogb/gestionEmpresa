<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use App\Models\Empresa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empleados =  Empleado::paginate(10);
        return view('empleado.index', compact('empleados'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('empleado.create', ['empresas' => Empresa::all()]);
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
            'apellidos' => 'required',
            'correo' => 'email',
            'telefono' => 'integer',
        ]);

        $empleado = new Empleado;

        $empleado->nombre = $request->input('nombre');
        $empleado->apellidos = $request->input('apellidos');
        $empleado->correo = $request->input('correo');
        $empleado->telefono = $request->input('telefono');
        $empleado->empresa_id = $request->input('empresa');

        $empleado->save();

        return redirect()->route('indexEmpleado');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('empleado.edit', ['empleado' => Empleado::findOrFail($id), 'empresas' => Empresa::all()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required',
            'apellidos' => 'required',
            'correo' => 'email',
            'telefono' => 'integer',
        ]);

        $empleado = Empleado::findOrFail($id);

        $empleado->nombre = $request->input('nombre');
        $empleado->apellidos = $request->input('apellidos');
        $empleado->correo = $request->input('correo');
        $empleado->telefono = $request->input('telefono');
        $empleado->empresa_id = $request->input('empresa');

        $empleado->save();

        return redirect()->route('indexEmpleado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('empleados')->delete($id);

        return redirect()->route('indexEmpleado');
    }
}
