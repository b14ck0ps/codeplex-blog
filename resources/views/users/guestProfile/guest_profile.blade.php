@extends('Layout.skeleton.guest_profile')
@section('dashboard-content')
    <main class="p-5 m-auto mt-5">
        <article class="pb-4 border-b-[1px] border-gray-200">
            <!-- This section will be dynamic -->
            <a href="{{ route('guestProfile', ['id' => 'azran']) }}">
                <section>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-1">
                            <div class="w-6 h-6 overflow-hidden rounded-full">
                                <img class="object-cover object-center w-full h-full"
                                    src="{{ asset('/storage/' . auth()->user()->profile_photo_path) }}" alt="User Profile Photo">
                            </div>
                            <p>Azran Hossain</p>
                        </div>
                        <p>{{ date('M d, Y') }}</p>
                    </div>
                </section>
            </a>
            <a href="{{ route('blog.content', ['id' => 'fj4jth4lrh']) }}">
                <section class="flex justify-between gap-5 mt-4 lg:gap-52">
                    <div>
                        <h1 class="font-bold">Use Git like a senior engineer</h1>
                        <p class="hidden md:block">
                            In this article, I will show you how to use Git like a senior engineer. I will show you how to
                            use
                            Git
                            in a team environment and how to use Git in a single developer environment. I will also show you
                            how...
                        </p>
                    </div>
                    <img class="w-36" src="https://miro.medium.com/v2/resize:fill:160:112/1*c98MmRRHROTav94yXKNMYw.png"
                        alt="cover">
                </section>
            </a>
            <div class="mt-5">
                <span class="p-2 text-center ">Tags:</span>
                <a href="/sort?tag=programming" class="p-2 text-sm text-center bg-gray-100 rounded-full">Programming</a>
                <a href="/sort?tag=Git" class="p-2 text-sm text-center bg-gray-100 rounded-full">Git</a>
            </div>
        </article>
    </main>
@endsection
