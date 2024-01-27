@extends('layouts.app')

@section('content')

<div class="container">

@if (count($errors)>0)
    <div class="alert alert-danger" role="alert">
    <ul>
        @foreach($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
    </ul>
    </div> 
@endif



<form action="{{ url('/vehiculos')}}" class="form-horizontal" method="post">
{{ csrf_field() }}

@include('vehiculos.form',['Modo'=>'crear'])



</form>
</div>
@endsection