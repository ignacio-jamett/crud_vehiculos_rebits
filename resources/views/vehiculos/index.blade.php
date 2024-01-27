@extends('layouts.app')

@section('content')

<div class="container">

@if (Session::has('Mensaje'))

<div class="alert alert-success" role="alert">
   {{
    Session::get('Mensaje')
    }} 
</div>


@endif


<a href="{{ url('vehiculos/create')}}" class='btn btn-success'>Agregar vehiculo</a>
<br>
<br>

<table class="table table-light table-hover">
    <thead class="thead-light">
        <tr>
            <th>{{'#'}}</th>
            <th>Marca</th>
            <th>Modelo</th>
            <th>Año</th>
            <th>Dueño</th>
            <th>Precio</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>

    
    @foreach ($vehiculos as $vehiculo)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$vehiculo->marca}}</td>
            <td>{{$vehiculo->modelo}}</td>
            <td>{{$vehiculo->anio}}</td>
            <td>{{$vehiculo->nombre_usuario.' '.$vehiculo->apellido_usuario}}</td>
            <td>{{$vehiculo->precio}}</td>
            <td>
            <a class="btn btn-warning" href="{{ url('/vehiculos/'.$vehiculo->id.'/edit')}}">
            Editar
            </a> | 
                <form method="post" action="{{ url('/vehiculos/'.$vehiculo->id)}}" style="display:inline">
                {{csrf_field()}}
                {{ method_field('DELETE')}}
                <button class="btn btn-danger" type="submit" onClick="return confirm('¿Borrar?');">
                Borrar
                </button>
                </form>
            </td>
        </tr>
    @endforeach
    
        
    </tbody>
</table>
{{$vehiculos->links()}}
</div>
@endsection