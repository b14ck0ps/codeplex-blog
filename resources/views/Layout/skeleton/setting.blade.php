@extends('Layout.app')

@section('content')
    <div class="md:flex lg:mx-52">
        <section class="p-8 xl:w-2/3 ">
            <h1 class="mb-5 text-2xl font-bold">Settings</h1>
            <nav class="py-5 border-b-[1px] border-black border-opacity-10">
                <a class="pb-[1.30rem] mr-5 hover:opacity-100 {{ Route::currentRouteName() === 'setting' ? 'border-b-[1px] border-black' : 'opacity-70' }}"
                    href="{{ route('setting') }}">Account</a>
                <a class="pb-[1.30rem] mr-2 hover:opacity-100 {{ Route::currentRouteName() === 'security' ? 'border-b-[1px] border-black' : 'opacity-70' }}"
                    href="{{ route('security') }}">Security</a>
            </nav>
            <main class="my-4 rounded-lg ">
                @yield('setting-content')
            </main>
        </section>
        <div class="flex-grow hidden w-1/2 px-5 pt-10 border-l-[1px] xl:block h-screen">
            <div class="hidden pl-5 lg:block">
                <div class="w-24 h-24 mb-5 overflow-hidden rounded-full">
                    <img class="object-cover object-center w-full h-full"
                        src="{{ asset('/storage/' . auth()->user()->profile_photo_path) }}" alt="User Profile Photo">
                </div>

                <h3 class="mb-10 text-xl font-bold lg:font-semibold">{{ auth()->user()->name }}</h3>
                <section>
                    <h1 class="mb-3 text-xl">About:</h1>
                    <p class="py-2 mb-4">
                        {{ auth()->user()->about ?? 'You can write about yourself here.' }}
                    </p>
                    <button class="text-blue-500 hover:text-blue-700" data-drawer-target="drawer-bottom-about"
                        data-drawer-show="drawer-bottom-about" data-drawer-placement="bottom"
                        aria-controls="drawer-bottom-about" aria-hidden="true"
                        onclick="document.querySelector('#drawer-bottom-about').removeAttribute('hidden')">
                        Edit
                    </button>
                </section>
            </div>
        </div>
    </div>
@endsection
