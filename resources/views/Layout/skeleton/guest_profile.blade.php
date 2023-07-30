@extends('Layout.app')

@section('content')
    <div class="md:flex lg:mx-52">
        <section class="p-8 xl:w-2/3 ">
            <div class="flex items-center gap-8">
                <img class="w-16 rounded-full lg:hidden" src="{{ asset('/storage/' . auth()->user()->profile_photo_path) }}" alt="707">
                <h3 class="text-2xl font-bold lg:font-semibold lg:text-5xl">{{ 'Azran Hossain' }}</h3>
            </div>

            <nav class="py-5 border-b-[1px] border-black border-opacity-10">
                <a class="pb-[1.30rem] mr-5 hover:opacity-100 {{ Route::currentRouteName() === 'guestProfile' ? 'border-b-[1px] border-black' : 'opacity-70' }}"
                    href="{{ route('guestProfile', ['id' => 'azran']) }}">Home</a>
                <a class="pb-[1.30rem] mr-2 hover:opacity-100 {{ Route::currentRouteName() === 'guestProfile.about' ? 'border-b-[1px] border-black' : 'opacity-70' }}"
                    href="{{ route('guestProfile.about', ['id' => 'azran']) }}">About</a>
            </nav>
            <main class="my-4 rounded-lg bg-gray-50">
                @yield('dashboard-content')
            </main>
        </section>
        <div class="flex-grow hidden w-1/2 px-5 pt-10 border-l-[1px] xl:block h-screen">
            <div class="hidden pl-5 lg:block">
                <div class="mb-5 overflow-hidden rounded-full w-28 h-28">
                    <img class="object-cover object-center w-full h-full"
                        src="{{ asset('/storage/' . auth()->user()->profile_photo_path) }}" alt="User Profile Photo">
                </div>
                <h3 class="mb-10 text-xl font-bold lg:font-semibold">{{ 'Azran Hossain' }}</h3>
                <h4 class="my-3 text-xl">About :</h4>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sequi molestias perferendis atque? Aperiam,
                    dolor? Repudiandae placeat saepe corporis, ratione ex necessitatibus facilis a id cupiditate animi
                    molestias assumenda voluptas. Esse?Rerum labore sequi dolorum recusandae, deserunt repudiandae aut
                    tempora qui, eum accusantium atque! Numquam nisi odio facilis, labore voluptates, ab in explicabo
                    deserunt pariatur commodi dolorem quo et corporis natus
                </p>
            </div>
        </div>
    </div>
@endsection
