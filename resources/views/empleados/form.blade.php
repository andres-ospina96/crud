{{ $Mode=='crear' ? 'Agregar empleado':'Modificar empleado'}}

<div class="form-group">
<label for="PrimerNombre" class="control-label ">{{'Nombres'}}</label>
<input type="text"  class="form-control {{$errors->has('PrimerNombre')?'is-invalid':''}}"    
name="PrimerNombre" id="PrimerNombre" value="{{ isset($empleado->PrimerNombre)?$empleado->PrimerNombre:old('PrimerNombre')}}">

</div>

<div class="form-group">
    <label for="SegundoNombre" class="control-label ">{{'Apellidos'}}</label>
    <input type="text"  class="form-control {{$errors->has('SegundoNombre')?'is-invalid':''}}"    
    name="SegundoNombre" id="SegundoNombre" value="{{ isset($empleado->SegundoNombre)?$empleado->SegundoNombre:old('SegundoNombre')}}">
    
</div>

<div class="form-group">
    <label for="Empresa" class="control-label ">{{'Empresa'}}</label>
    <input type="text"  class="form-control {{$errors->has('Empresa')?'is-invalid':''}}"    
    name="Empresa" id="Empresa" value="{{ isset($empleado->Empresa)?$empleado->Empresa:old('Empresa')}}">
    
</div>

<div class="form-group">
<label for="Email" class="control-label">{{'Email'}}</label>
<input type="email"  class="form-control {{$errors->has('Email')?'is-invalid':''}}" 
name="Email" id="Email" value="{{ isset($empleado->Email)?$empleado->Email:old('Email')}}">
</div>

<div class="form-group">
<label for="Telefono" class="control-label">{{'Telefono'}}</label>
<input type="text"    class="form-control {{$errors->has('Telefono')?'is-invalid':''}}" 
name="Telefono" id="Telefono" value="{{ isset($empleado->Telefono)?$empleado->Telefono:old('Telefono')}}">
</div>

<input type="submit" value="Agregar" class="btn btn-success">
<a href="{{url('empleados')}}" class="btn btn-secondary">Regresar</a>
