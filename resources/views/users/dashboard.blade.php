@extends('Layout.skeleton.dashboard')

@section('dashboard-content')
    <div class="justify-between 2xl:flex">
        <div class="p-5">
            <div class="flex w-[200px] gap-2">
                <div class="mb-5 overflow-hidden rounded-full w-7 h-7">
                    <img class="object-cover object-center w-full h-full"
                        src="{{ asset('/storage/' . auth()->user()->profile_photo_path) }}" alt="User Profile Photo">
                </div>
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
