@extends('layouts.app')

@section('content')

<div class="container">

<form action="{{ url('/vehiculos/'.$vehiculo->id)}}" method="post">
{{ csrf_field() }}
{{ method_field('PATCH') }}

@include('vehiculos.form',['Modo'=>'editar'])

</form>
</div>
@endsection