@include('Layout.header')

@section('content')
    <section
        class=" flex flex-col h-screen justify-center p-3 lg:flex-row lg:gap-16 lg:justify-normal lg:items-center lg:p-0">
        <img class="hidden lg:block w-1/2 h-full object-cover"
            src="{{ asset('banners/auth-page-banner-left.jpg') }}" alt="banner">
        <div class="flex flex-col gap-8 lg:gap-10">
            <h1 class="pl-5 text-3xl lg:text-5xl xl:text-6xl ">
                Welcome to CodePlex, <br>
                Login to Continue.
            </h1>
            <p class="ml-5 text-sm lg:text-base lg:mb-5">
                Don't have an account?
                <a class="text-blue-500 hover:text-blue-800" href="/registration">Register</a> <br>
                It takes less than a minute.
            </p>
            <form class="p-5" action="/registration" method="post">
                <label for="email">Email</label>
                <input class="border border-black block p-2 w-full mb-2 lg:mb-5 rounded-sm " type="email" name="email"
                    id="email" placeholder="Enter your email" required>
                <label for="password">Password</label>
                <input class=" border border-black block p-2 w-full mb-2 lg:mb-5 rounded-sm" type="password" name="password"
                    id="password" placeholder="Enter your password" required>
                <label for="password_confirmation">Confirm Password</label>
                <input class=" border border-black block p-2 w-full mb-2 lg:mb-5 rounded-sm" type="password"
                    name="password_confirmation" id="password_confirmation" placeholder="Confirm your password" required>

                <a href="/forgot">
                    <p class="text-center underline hover:text-blue-500">Forgot Password?</p>
                </a>

                <button class="bg-black px-10 py-2 text-white w-full mt-5 font-semibold lg:mt-10 hover:text-blue-500"
                    type="submit">Login</button>
                <button class="bg-gray-100 px-10 py-2 w-full mt-3 font-semibold lg:mt-4">
                    <div class="flex gap-2 items-center justify-center hover:text-blue-500">
                        <img class="w-5" src="{{ asset('icons/google.png') }}" alt="google icon">
                        Sign in with Google
                    </div>
                </button>
            </form>
        </div>
    </section>
@endsection

@include('Layout.header')
