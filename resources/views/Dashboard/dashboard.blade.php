@extends('template')

@section('content')


<div class="container mt-4">
@if (session('alert_message'))
          <div class="alert alert-success">
              {{ session('alert_message') }}
          </div>
          @endif
    <h1>Hello, {{ Session::get('nama') }}</h1>
</div>


@stop