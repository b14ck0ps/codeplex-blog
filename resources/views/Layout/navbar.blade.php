<nav class="flex items-center justify-between px-5 border-b-[1px]">
    <div class="flex gap-5">
        <a href="{{ route('home') }}" class="flex gap-5">
            @svg('fas-blog', ['class' => 'w-8 h-8'])
        </a>
        <div class="relative hidden lg:flex lg:items-center">
            <form action="{{ route('search') }}">
                <span class="absolute transform -translate-y-1/2 left-2 top-1/2">
                    @svg('css-search', ['class' => 'w-6 h-6 opacity-60'])
                </span>
                <input name="q" type="text" class="px-4 py-1 pl-12 bg-gray-100 rounded-full"
                    placeholder="Search Blog" value="{{ $search ?? "" }}">
            </form>
        </div>

    </div>
    <div class="flex items-center justify-between gap-5 lg:gap-10">
        <a href="{{ route('search') }}">@svg('css-search', ['class' => 'w-8 h-8 opacity-60 lg:hidden'])</a>
        <a href="{{ route('writePost') }}"
            class="hidden px-4 py-2 text-gray-800 lg:block lg:opacity-80 hover:opacity-100">
            @svg('jam-write', ['class' => 'w-6 h-6 inline-block mr-2'])
            Write Post
        </a>
        <a href="{{ route('notification') }}">@svg('carbon-notification', ['class' => 'w-8 h-8 opacity-70 lg:opacity-70 hover:opacity-100'])</a>
        <div class="max-w-lg mx-auto">

            <!-- Dropdown toggle -->
            <button class="flex items-start px-4 mt-5 text-sm text-center" type="button"
                data-dropdown-toggle="dropdown">
                <div class="w-8 h-8 mb-5 overflow-hidden rounded-full">
                    <img class="object-cover object-center w-full h-full"
                        src="{{ asset('/storage/' . auth()->user()->profile_photo_path) }}" alt="User Profile Photo">
                </div>
                @svg('gmdi-keyboard-arrow-down-s', ['class' => 'w-8 h-8 opacity-70'])
            </button>

            <!-- Dropdown menu -->
            <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded shadow"
                id="dropdown">
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
                <a href="{{ route('setting') }}"
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
