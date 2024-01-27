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

<table class="table table-light table-hover">
    <thead class="thead-light">
        <tr>
            <th>{{'#'}}</th>
            <th>Marca</th>
            <th>Modelo</th>
            <th>Dueño anterior</th>
            <th>Dueño nuevo</th>
            <th>Fecha de transferencia</th>
        </tr>
    </thead>
    <tbody>

    
    @foreach ($historicos as $historico)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$historico->marca}}</td>
            <td>{{$historico->modelo}}</td>
            <td>{{$historico->duenio_anterior}}</td>
            <td>{{$historico->duenio_nuevo}}</td>
            <td>{{$historico->created_at}}</td>
        </tr>
    @endforeach
    
        
    </tbody>
</table>
{{$historicos->links()}}
</div>
@endsection