<nav class="flex items-center justify-between px-5 py-2 border-b-[1px]">
    <div class="flex gap-5">
        <a href="{{ route('dashboard') }}" class="flex gap-5">
            @svg('fas-blog', ['class' => 'w-8 h-8'])
        </a>
        <div class="relative hidden lg:flex lg:items-center">
            <a href="{{ route('search') }}" class="absolute transform -translate-y-1/2 left-2 top-1/2">
                @svg('css-search', ['class' => 'w-6 h-6 opacity-60'])
            </a>
            <input type="text" class="px-4 py-1 pl-12 bg-gray-100 rounded-full" placeholder="Search Blog">
        </div>

    </div>
    <div class="flex items-center justify-between gap-5 lg:gap-10">
        <a href="{{ route('search') }}">@svg('css-search', ['class' => 'w-8 h-8 opacity-60 lg:hidden'])</a>
        <a href="{{ route('notification') }}">@svg('carbon-notification', ['class' => 'w-8 h-8 opacity-70 lg:opacity-70 hover:opacity-100'])</a>
        <a href="{{ route('writePost') }}" class="hidden px-4 py-2 text-gray-800 lg:block lg:opacity-80 hover:opacity-100">
            @svg('jam-write', ['class' => 'w-6 h-6 inline-block mr-2'])
            Write Post
        </a>
        <div x-data="dropdownHandler()" @click.away="close">
            <div class="flex items-center cursor-pointer" @click="toggle">
                <img class="w-8 rounded-full" src="{{ asset('images/707.jpg') }}" alt="707">
                @svg('gmdi-keyboard-arrow-down-s', ['class' => 'w-8 h-8 opacity-70'])
            </div>

            <div x-show="isOpen" x-cloak class="absolute right-0 py-2 mt-2 bg-white rounded-lg shadow-lg">
                <a href="{{ route('writePost') }}"
                    class="block px-4 py-2 text-gray-800 hover:bg-blue-500 hover:text-white">
                    @svg('jam-write', ['class' => 'w-6 h-6 inline-block mr-2'])
                    Write Post
                </a>
                <a href="{{ route('dashboard') }}"
                    class="block px-4 py-2 text-gray-800 hover:bg-blue-500 hover:text-white">
                    @svg('css-profile', ['class' => 'w-6 h-6 inline-block mr-2'])
                    Dashboard
                </a>
                <a href="{{ route('dashboard') }}"
                    class="block px-4 py-2 text-gray-800 hover:bg-blue-500 hover:text-white">
                    @svg('go-gear-16', ['class' => 'w-6 h-6 inline-block mr-2'])
                    Setting
                </a>
                <a href="{{ route('logout') }}"
                    class="block px-4 py-2 text-red-500 hover:bg-blue-500 hover:text-white">
                    @svg('ri-logout-circle-line', ['class' => 'w-6 h-6 inline-block mr-2'])
                    Logout
                </a>
            </div>
        </div>
    </div>
</nav>
<script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.js"></script>
<script>
    function dropdownHandler() {
        return {
            isOpen: false,
            toggle() {
                this.isOpen = !this.isOpen;
            },
            close() {
                this.isOpen = false;
            },
            open() {
                this.isOpen = true;
            },
        };
    }
</script>
