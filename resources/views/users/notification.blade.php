@extends('Layout.app')

@section('content')
    <section class="p-8 m-auto xl:w-2/3">
        <div class="flex items-center gap-8">
            <h3 class="text-2xl font-bold lg:font-semibold lg:text-5xl">Notifications</h3>
        </div>
        <nav class="py-5 border-b-[1px] border-black border-opacity-10">
            <a class="pb-[1.30rem] mr-5 hover:opacity-100 {{ Route::currentRouteName() === 'dashboard' ? 'border-b-[1px] border-black' : 'opacity-70' }}"
                href="{{ route('dashboard') }}">All</a>
            <a class="pb-[1.30rem] mr-2 hover:opacity-100 {{ Route::currentRouteName() === 'about' ? 'border-b-[1px] border-black' : 'opacity-70' }}"
                href="{{ route('about') }}">Response</a>
        </nav>
        <main class="p-3 my-4 text-sm text-gray-500 rounded-lg">
            <p>You're all cought up.</p>
        </main>
    </section>
@endsection
