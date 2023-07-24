@extends('Layout.app')
@section('content')
    <main class="flex flex-col justify-center h-screen p-3 lg:flex-row lg:gap-16 lg:justify-normal lg:items-center lg:p-0">
        <img class="hidden object-cover w-1/2 h-full lg:block" src="{{ asset('banners/auth-page-banner-left.jpg') }}"
            alt="banner">
        <div class="flex flex-col gap-8 lg:gap-10">
            <h1 class="pl-5 text-3xl lg:text-4xl 2xl:text-6xl ">
                Welcome to CodePlex, <br>
                Login to Continue.
            </h1>
            <p class="ml-5 text-sm lg:text-base lg:mb-5">
                Don't have an account?
                <a class="text-blue-500 hover:text-blue-800" href="/registration">Register</a> <br>
                It takes less than a minute.
            </p>

            @if (session('status'))
                <div class="px-5 py-3 mx-5 text-center text-white bg-red-500 rounded-sm">
                    {{ session('status') }}
                </div>
            @endif

            <form class="p-5" action="{{ route('login') }}" method="post">
                @csrf
                <label for="email">Email</label>
                <input class="block w-full p-2 mb-2 border border-black rounded-sm lg:mb-5 " type="email" name="email"
                    id="email" placeholder="Enter your email" required>
                <label for="password">Password</label>
                <input class="block w-full p-2 mb-2 border border-black rounded-sm lg:mb-5" type="password" name="password"
                    id="password" placeholder="Enter your password" required>

                <input type="checkbox" name="remember" id="remember">
                <label for="remember">Remember Me</label>

                <a href="/forgot">
                    <p class="mt-5 text-center underline hover:text-blue-500">Forgot Password?</p>
                </a>

                <button class="w-full px-10 py-2 mt-5 font-semibold text-white bg-black lg:mt-10 hover:text-blue-500"
                    type="submit">Login</button>
                <button class="w-full px-10 py-2 mt-3 font-semibold bg-gray-100 lg:mt-4">
                    <div class="flex items-center justify-center gap-2 hover:text-blue-500">
                        <img class="w-5" src="{{ asset('icons/google.png') }}" alt="google icon">
                        Sign in with Google
                    </div>
                </button>
            </form>
        </div>
    </main>
@endsection
