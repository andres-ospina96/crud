
@extends('layouts.app')

@section('content')

<div class="container">

@if(Session::has('Mensaje'))
<div class="alert alert-success" role="alert">
{{
    Session::get('Mensaje')
}}
</div>
@endif


<a href="{{url('empresas/create')}}" class="btn btn-success">Agregar Empresa</a>
<br/>
<br/>

<table class="table table-light table-hover">
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>Email</th>
            <th>Logo</th>
            <th>Website</th>
            <th>Acciones</th>
        </tr>
    </thead>

    <tbody>
    @foreach ($empresas as $empresa)
        <tr>
        <td>{{$loop->iteration}}</td>
        <td>{{$empresa->Nombre}}</td>
        <td>{{$empresa->Email}}</td>
        <td>
            <img src="{{ asset ('storage').'/'.$empresa->logo}}" alt="" width="100" height="100" class="img-thumbnail img-fluid">
        </td>
        <td>{{$empresa->website}}</td>
        <td>
        <a href="{{url('empresas/'.$empresa->id.'/edit')}}" class="btn btn-warning">
        Editar
        </a>    
        
        <form action="{{ url('/empresas/'.$empresa->id)}}" method="post" style="display:inline" >
        {{ csrf_field() }}
        {{method_field('DELETE')}}
        <button type="submit" class="btn btn-danger" onclick="return confirm('¿Esta seguro de borrar este campo?');">Borrar</button>


        </form>
        </td>
        </tr>
    @endforeach    
    </tbody>
</table>

{{$empresas->links()}}

</div>
@endsection