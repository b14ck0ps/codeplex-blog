@extends('Layout.app')

@section('content')
    <section
        class="flex flex-col justify-center h-screen p-3 lg:flex-row lg:gap-16 lg:justify-normal lg:items-center lg:p-0">
        <img class="hidden object-cover w-1/2 h-full lg:block" src="{{ asset('banners/auth-page-banner-left.jpg') }}"
            alt="banner">
        <div class="flex flex-col gap-8 lg:gap-24">
            <h1 class="pl-5 text-3xl lg:text-4xl 2xl:text-6xl 2xl:mt-5">
                Welcome to CodePlex, <br>
                Create your account.
            </h1>
            <form class="px-5" action="{{ route('registration_page') }}" method="post" enctype="multipart/form-data">
                @csrf

                <label for="name">Name</label>
                <input class="block w-full p-2 mb-2 border border-black rounded-sm lg:mb-5 " type="text" name="name"
                    id="name" placeholder="Enter your name" required>
                @if ($errors->has('name'))
                    <p class="text-red-500">{{ $errors->first('name') }}</p>
                @endif

                <label for="username">Username</label>
                <input class="block w-full p-2 mb-2 border border-black rounded-sm lg:mb-5 " type="text" name="username"
                    id="username" placeholder="Enter your username" required>
                @if ($errors->has('username'))
                    <p class="text-red-500">{{ $errors->first('username') }}</p>
                @endif

                <label for="email">Email</label>
                <input class="block w-full p-2 mb-2 border border-black rounded-sm lg:mb-5 " type="email" name="email"
                    id="email" placeholder="Enter your email" required>
                @if ($errors->has('email'))
                    <p class="text-red-500">{{ $errors->first('email') }}</p>
                @endif

                <label for="password">Password</label>
                <input class="block w-full p-2 mb-2 border border-black rounded-sm lg:mb-5" type="password" name="password"
                    id="password" placeholder="Enter your password" required>
                @if ($errors->has('password'))
                    <p class="text-red-500">{{ $errors->first('password') }}</p>
                @endif

                <label for="password_confirmation">Confirm Password</label>
                <input class="block w-full p-2 mb-2 border border-black rounded-sm lg:mb-5" type="password"
                    name="password_confirmation" id="password_confirmation" placeholder="Confirm your password" required>
                @if ($errors->has('password_confirmation'))
                    <p class="text-red-500">{{ $errors->first('password_confirmation') }}</p>
                @endif

                <label for="profile-picture">Profile Picture</label>
                <input class="block w-full p-2 mb-2 border border-black rounded-sm lg:mb-5" type="file"
                    name="profile-picture" id="profile-picture">
                @if ($errors->has('profile-picture'))
                    <p class="text-red-500">{{ $errors->first('profile-picture') }}</p>
                @endif

                <p>
                    Already have an account?
                    <a class="text-blue-500 hover:text-blue-700" href="/login">Login</a>
                </p>
                <button class="w-full px-10 py-2 mt-2 font-semibold text-white bg-black lg:mt-16 hover:text-blue-500"
                    type="submit">Register</button>
                <button class="w-full px-10 py-2 mt-3 font-semibold bg-gray-100 hover:text-blue-500">
                    <div class="flex items-center justify-center gap-2">
                        <img class="w-5" src="{{ asset('icons/google.png') }}" alt="google icon">
                        Sign up with Google
                    </div>
                </button>
            </form>
        </div>
    </section>
@endsection
