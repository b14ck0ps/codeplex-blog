@extends('Layout.app')

@section('content')
    <h1>
        Welcome to CodePlex, {{ auth()->user()->name }}
    </h1>

    <a class="text-red-500" href="/logout">Logout</a>
@endsection
