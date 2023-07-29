@extends('Layout.app')

@section('content')
    <div class="md:flex lg:mx-52">
        <section class="p-8 xl:w-2/3 ">
            <div class="flex items-center gap-8">
                <img class="w-16 rounded-full lg:hidden" src="{{ asset('images/707.jpg') }}" alt="707">
                <h3 class="text-2xl font-bold lg:font-semibold lg:text-5xl">{{ auth()->user()->name }}</h3>
            </div>
            <nav class="py-5 border-b-[1px] border-black border-opacity-10">
                <a class="pb-[1.30rem] mr-5 hover:opacity-100 {{ Route::currentRouteName() === 'dashboard' ? 'border-b-[1px] border-black' : 'opacity-70' }}"
                    href="{{ route('dashboard') }}">Home</a>
                <a class="pb-[1.30rem] mr-2 hover:opacity-100 {{ Route::currentRouteName() === 'about' ? 'border-b-[1px] border-black' : 'opacity-70' }}"
                    href="{{ route('about') }}">About</a>
            </nav>
            <main class="my-4 rounded-lg bg-gray-50">
                @yield('dashboard-content')
            </main>
        </section>
        <div class="flex-grow hidden w-1/2 px-5 pt-10 border-l-[1px] xl:block h-screen">
            <div class="hidden pl-5 lg:block">
                <img class="w-24 mb-5 rounded-full" src="{{ asset('images/707.jpg') }}" alt="707">
                <h3 class="mb-10 text-xl font-bold lg:font-semibold">{{ auth()->user()->name }}</h3>
                <a class="text-sm text-green-600 hover:text-black" href="/setting">Edit Profile</a>
            </div>
        </div>
    </div>
@endsection
