<?php

namespace App\Http\Controllers;

use App\Empleados;
use Illuminate\Http\Request;

class EmpleadosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['empleados']=Empleados::paginate(10);

        return view('empleados.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('empleados.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $request->validate([
            'PrimerNombre' => 'required|string|max:100',
            'SegundoNombre' => 'required|string|max:100',
            'Empresa' => 'required|string|max:100',
            'Email'  => 'required|email',
            'Telefono' => 'required|string|max:10'
        ]);

        $datosEmpleado=request()->except('_token');

        Empleados::insert($datosEmpleado);

        return redirect('empleados')->with('Mensaje','Empleado creada con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Empleados  $empleados
     * @return \Illuminate\Http\Response
     */
    public function show(Empleados $empleados)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Empleados  $empleados
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $empleado=Empleados::findOrFail($id);

        return view('empleados.edit',compact('empleado'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Empleados  $empleados
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'PrimerNombre' => 'required|string|max:100',
            'SegundoNombre' => 'required|string|max:100',
            'Empresa' => 'required|string|max:100',
            'Email'  => 'required|email',
            'Telefono' => 'required|string|max:10'
        ]);

        $datosEmpleado=request()->except(['_token','_method']);


        Empleados::where('id','=',$id)->update($datosEmpleado);

        return redirect('empleados')->with('Mensaje','Empleado modoficada con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Empleados  $empleados
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
                //
        $empleado=Empleados::findOrFail($id);

        Empleados::destroy($id);
        return redirect('empleados')->with('Mensaje','Empleado eliminada');
    }
}
