
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


<a href="{{url('empleados/create')}}" class="btn btn-success">Agregar Empleado</a>
<br/>
<br/>

<table class="table table-light table-hover">
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Nombres</th>
            <th>Apellidos</th>
            <th>Empresa</th>
            <th>Email</th>
            <th>Telefono</th>
            <th>Acciones</th>
        </tr>
    </thead>

    <tbody>
    @foreach ($empleados as $empleado)
        <tr>
        <td>{{$loop->iteration}}</td>
        <td>{{$empleado->PrimerNombre}}</td>
        <td>{{$empleado->SegundoNombre}}</td>
        <td>{{$empleado->Empresa}}</td>
        <td>{{$empleado->Email}}</td>
        <td>{{$empleado->Telefono}}</td>
        <td>
        <a href="{{url('empleados/'.$empleado->id.'/edit')}}" class="btn btn-warning">
        Editar
        </a>    
        
        <form action="{{ url('/empleados/'.$empleado->id)}}" method="post" style="display:inline" >
        {{ csrf_field() }}
        {{method_field('DELETE')}}
        <button type="submit" class="btn btn-danger" onclick="return confirm('¿Esta seguro de borrar este campo?');">Borrar</button>


        </form>
        </td>
        </tr>
    @endforeach    
    </tbody>
</table>

{{$empleados->links()}}

</div>
@endsection
