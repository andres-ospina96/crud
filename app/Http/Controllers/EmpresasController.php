<?php

namespace App\Http\Controllers;

use App\Empresas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EmpresasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $datos['empresas']=Empresas::paginate(10);

        return view('empresas.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('empresas.create');
        
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
            'Nombre' => 'required|string|max:100',
            'Email' => 'required|email',
            'Logo' => 'required|max:10000|mimes:jpeg,png,jpg',
            'Website' => 'required|string|max:100'
        ]);

        //$this->validate($request);


        $datosEmpresa=request()->except('_token');
        
        if($request->hasFile('Logo')){
            $datosEmpresa['Logo']=$request->file('Logo')->store('logos','public');
        }

        Empresas::insert($datosEmpresa);
        //return response()->json($datosEmpresa);
        return redirect('empresas')->with('Mensaje','Empresa creada con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Empresas  $empresas
     * @return \Illuminate\Http\Response
     */
    public function show(Empresas $empresas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Empresas  $empresas
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //

        $empresa=Empresas::findOrFail($id);

        return view('empresas.edit',compact('empresa'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Empresas  $empresas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

        $request->validate([
            'Nombre' => 'required|string|max:100',
            'Email' => 'required|email',
            'Website' => 'required|string|max:100'
        ]);

        if($request->hasFile('Logo')){
        
            $request+=['required|max:10000|mimes:jpeg,png,jpg'];
        }

        //$this->validate($request,$camposEmp);

        $datosEmpresa=request()->except(['_token','_method']);
        
        if($request->hasFile('Logo')){
            $empresa=Empresas::findOrFail($id);

            Storage::delete('public/'.$empresa->logo);

            $datosEmpresa['Logo']=$request->file('Logo')->store('logos','public');
        }

        Empresas::where('id','=',$id)->update($datosEmpresa);

        $empresa=Empresas::findOrFail($id);

        //return view('empresas.edit',compact('empresa'));
        return redirect('empresas')->with('Mensaje','Empresa modoficada con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Empresas  $empresas
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $empresa=Empresas::findOrFail($id);

        if (Storage::delete('public/'.$empresa->logo)){

        Empresas::destroy($id);
        
        }

        return redirect('empresas')->with('Mensaje','Empresa eliminada');
    }
}
