@extends('template')

@section('content')


<div class="container mt-4">
    <h1>Hello, {{ Session::get('nama') }}</h1>
</div>


@stop