@extends('layouts.app')

@section('content')

<div class="container">


@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


<form action="{{ url('/empleados')}}" method="post" enctype="multipart/form-data" class="form-horizontal">
{{ csrf_field() }}
    
    @include('empleados.form',['Mode'=>'crear']) 


</form>

</div>
@endsection