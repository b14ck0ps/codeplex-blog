@extends('Layout.dashboard.dashboard')

@section('dashboard-content')
    <div class="justify-between 2xl:flex">
        <div class="p-5">
            <div class="flex w-[200px] gap-2">
                <img class="rounded-full w-7" src="{{ asset('images/707.jpg') }}" alt="707">
                <p>{{ auth()->user()->name }}</p>
            </div>
            <h1 class="my-3 font-bold">Reading List</h1>
            <P>No stories @svg('css-lock', ['class' => 'w-3 h-3 inline-block ml-2'])</P>
        </div>
        <div class="flex gap-1 mt-5 lg:m-0">
            <div class="w-32 h-20 bg-gray-100 lg:h-full"></div>
            <div class="h-20 bg-gray-100 w-28 lg:h-full"></div>
            <div class="w-20 h-20 bg-gray-100 lg:h-full"></div>
        </div>
    </div>
@endsection
