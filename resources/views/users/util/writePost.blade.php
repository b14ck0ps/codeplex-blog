@extends('Layout.skeleton.write')
@section('content')
    <main class="p-3 mt-5 lg:w-3/4 lg:m-auto lg:mt-10">
        <input class="text-4xl focus:outline-none lg:text-5xl" type="text" placeholder="Title" name="title">
        <textarea class="w-full mt-5 ml-1 h-96 focus:outline-none lg:text-xl" placeholder="Tell Your sotry..." name="body"></textarea>
    </main>
@endsection
