<nav class="flex items-center justify-between px-5 py-2 border-b-[1px]">
    <div class="flex gap-5">
        <a href="{{ route('home') }}" class="flex gap-5">
            @svg('fas-blog', ['class' => 'w-8 h-8'])
        </a>
    </div>

    </div>
    <div class="flex items-center justify-between gap-5 lg:gap-10">
        <button id="submit_blog_Btn" type="submit" class="px-4 bg-green-400 rounded-full hover:bg-green-600">
            Publish
        </button>
        <a href="{{ route('notification') }}">@svg('carbon-notification', ['class' => 'w-8 h-8 opacity-70 lg:opacity-70 hover:opacity-100'])</a>

        <!-- Dropdown toggle -->
        <button class="text-sm px-4 py-2.5 text-center inline-flex items-center" type="button"
            data-dropdown-toggle="dropdown">
            <img class="w-8 rounded-full" src="{{ asset('images/707.jpg') }}" alt="707">
            @svg('gmdi-keyboard-arrow-down-s', ['class' => 'w-8 h-8 opacity-70'])
        </button>

        <!-- Dropdown menu -->
        <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded shadow"
            id="dropdown">
            <a href="{{ route('writePost') }}" class="block px-4 py-2 text-gray-800 hover:bg-blue-500 hover:text-white">
                @svg('jam-write', ['class' => 'w-6 h-6 inline-block mr-2'])
                Write Post
            </a>
            <a href="{{ route('dashboard') }}" class="block px-4 py-2 text-gray-800 hover:bg-blue-500 hover:text-white">
                @svg('css-profile', ['class' => 'w-6 h-6 inline-block mr-2'])
                Dashboard
            </a>
            <a href="{{ route('setting') }}" class="block px-4 py-2 text-gray-800 hover:bg-blue-500 hover:text-white">
                @svg('go-gear-16', ['class' => 'w-6 h-6 inline-block mr-2'])
                Setting
            </a>
            <a href="{{ route('logout') }}" class="block px-4 py-2 text-red-500 hover:bg-blue-500 hover:text-white">
                @svg('ri-logout-circle-line', ['class' => 'w-6 h-6 inline-block mr-2'])
                Logout
            </a>
        </div>
    </div>
</nav>
