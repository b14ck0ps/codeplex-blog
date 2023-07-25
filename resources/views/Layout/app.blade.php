@include('Layout.header')
@guest
    <nav class="flex items-center md:justify-normal justify-center px-5 py-2 border-b-[1px]">
        <div class="flex gap-5">
            <a href="{{ route('dashboard') }}" class="flex gap-5">
                @svg('fas-blog', ['class' => 'w-8 h-8'])
            </a>
        </div>
    </nav>
@endguest
@auth
    @include('Layout.navbar')
@endauth
@yield('content')
@include('Layout.footer')
