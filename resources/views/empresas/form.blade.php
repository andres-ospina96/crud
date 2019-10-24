{{ $Mode=='crear' ? 'Agregar empresa':'Modificar empresa'}}

<div class="form-group">
<label for="Nombre" class="control-label ">{{'Nombre'}}</label>
<input type="text"  class="form-control {{$errors->has('Nombre')?'is-invalid':''}}"    
name="Nombre" id="Nombre" value="{{ isset($empresa->Nombre)?$empresa->Nombre:old('Nombre')}}">

</div>

<div class="form-group">
<label for="Email" class="control-label">{{'Email'}}</label>
<input type="email"  class="form-control {{$errors->has('Email')?'is-invalid':''}}" 
name="Email" id="Email" value="{{ isset($empresa->Email)?$empresa->Email:old('Email')}}">
</div>

<div class="form-group">
<label for="Logo" class="control-label">{{'Logo'}}</label>
@if(isset($empresa->logo))
    
<img src="{{ asset ('storage').'/'.$empresa->logo}}" alt="" width="100" height="100" class="img-thumbnail img-fluid" >

@endif
<input type="file"  class="form-control {{$errors->has('Logo')?'is-invalid':''}}" 
name="Logo" id="Logo" value="{{ isset($empresa->logo)?$empresa->logo:old('logo')}}">
</div>

<div class="form-group">
<label for="Website" class="control-label">{{'Website'}}</label>
<input type="text"    class="form-control {{$errors->has('Website')?'is-invalid':''}}" 
name="Website" id="Website" value="{{ isset($empresa->website)?$empresa->website:old('website')}}">
</div>

<input type="submit" value="Agregar" class="btn btn-success">
<a href="{{url('empresas')}}" class="btn btn-secondary">Regresar</a>
