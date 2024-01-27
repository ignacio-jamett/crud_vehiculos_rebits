{{--formulario datos de usuarios--}}
{{ $Modo=='crear' ? 'Agregar usuario':'Modificar usuario'}}
<br>
<div class="form-group">
    <label for="nombre" class="control-label">{{'Nombre'}}</label>
    <input  type="text" id="nombre" name="Nombre" class="form-control {{$errors->has('Nombre')? 'is-invalid':'' }}" value="{{ isset($usuario->Nombre) ? $usuario->Nombre:old('Nombre')}}">
    {!! $errors->first('Nombre','<div class="invalid-feedback">:message</div>') !!}
    
</div>

<div class="form-group">
<label for="apellidos" class="control-label">{{'Apellidos'}}</label>
<input  type="text" id="apellidos" name="Apellidos" class="form-control {{$errors->has('Apellidos')? 'is-invalid':'' }}" value="{{ isset($usuario->Apellidos) ? $usuario->Apellidos:old('Apellidos')}}">
{!! $errors->first('Apellidos','<div class="invalid-feedback">:message</div>') !!}
</div>

<div class="form-group">
<label for="correo" class="control-label">{{'Correo'}}</label>
<input  type="text" id="correo" name="Correo" class="form-control {{$errors->has('Correo')? 'is-invalid':'' }}" value="{{ isset($usuario->Correo) ? $usuario->Correo:old('Correo')}}">
{!! $errors->first('Correo','<div class="invalid-feedback">:message</div>') !!}
</div>
<br>
{{--boton submit--}}
<input type="submit" class="btn btn-success" value="{{ $Modo=='crear' ? 'Agregar usuario':'Aplicar cambios'}}">
<br>
<br>
<a class="btn btn-primary" href="{{ url('usuarios')}}">Regresar</a>