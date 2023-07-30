@include('Layout.header')
@guest
    <nav class="flex items-center justify-between px-5 py-2 border-b-[1px] ">
        <div class="flex gap-5">
            <a href="{{ route('home') }}" class="flex gap-5">
                @svg('fas-blog', ['class' => 'w-8 h-8'])
            </a>
        </div>
        <div class="flex gap-5">
            <a class="font-semibold hover:text-gray-700" href="{{ route('login_page') }}" class="flex gap-5">
                Login
            </a>
        </div>
    </nav>
@endguest
@auth
    @include('Layout.navbar')
@endauth
@yield('content')
@include('Layout.footer')
