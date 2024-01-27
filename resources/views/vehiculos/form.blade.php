{{--formulario datos de vehiculos--}}
{{ $Modo=='crear' ? 'Agregar vehiculo':'Modificar vehiculo'}}
<br>
<div class="form-group">
    <label for="marca" class="control-label">{{'marca'}}</label>
    <input  type="text" id="marca" name="marca" class="form-control {{$errors->has('marca')? 'is-invalid':'' }}" value="{{ isset($vehiculo->marca) ? $vehiculo->marca:old('marca')}}">
    {!! $errors->first('marca','<div class="invalid-feedback">:message</div>') !!}
    
</div>

<div class="form-group">
<label for="modelo" class="control-label">{{'modelo'}}</label>
<input  type="text" id="modelo" name="modelo" class="form-control {{$errors->has('modelo')? 'is-invalid':'' }}" value="{{ isset($vehiculo->modelo) ? $vehiculo->modelo:old('modelo')}}">
{!! $errors->first('modelo','<div class="invalid-feedback">:message</div>') !!}
</div>

<div class="form-group">
<label for="anio" class="control-label">{{'Año'}}</label>
<input  type="text" id="anio" name="anio" class="form-control {{$errors->has('anio')? 'is-invalid':'' }}" value="{{ isset($vehiculo->anio) ? $vehiculo->anio:old('anio')}}">
{!! $errors->first('anio','<div class="invalid-feedback">:message</div>') !!}
</div>

<div class="form-group">
    <label for="">Dueño</label>
    <select name="id_usuario" id="id_usuario" class="form-control">
        <option value="">--Seleccione una opción--</option>
        @foreach ($usuarios as $usuario)
            <option value="{{ $usuario->id}}">{{$usuario->Nombre}}</option>
        @endforeach
        
    </select>
</div>

<div class="form-group">
<label for="precio" class="control-label">{{'precio'}}</label>
<input  type="text" id="precio" name="precio" class="form-control {{$errors->has('precio')? 'is-invalid':'' }}" value="{{ isset($vehiculo->precio) ? $vehiculo->precio:old('precio')}}">
{!! $errors->first('precio','<div class="invalid-feedback">:message</div>') !!}
</div>

<br>
{{--boton submit--}}
<input type="submit" class="btn btn-success" value="{{ $Modo=='crear' ? 'Agregar vehiculo':'Aplicar cambios'}}">
<br>
<br>
<a class="btn btn-primary" href="{{ url('vehiculos')}}">Regresar</a>