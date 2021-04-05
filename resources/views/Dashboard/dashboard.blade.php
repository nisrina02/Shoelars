@extends('template')

@section('content')

<br>
<br>
<div class="container">
    <h1>Hello, {{ Session::get('nama') }}</h1>
</div>


@stop