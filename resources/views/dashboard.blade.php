@extends('base')
@section('title')
    Ztech | Dashboard
@endsection
@section('content')
<h1>
    Hello, {{session('username')}}
</h1>
@endsection