@extends('Layout.skeleton.dashboard')

@section('dashboard-content')
    @if ($posts->count() != 0)
        @foreach ($posts as $post)
            <article class="border-b-[1px] border-gray-200 p-5">
                <a href="{{ route('guestProfile', ['username' => auth()->user()->username]) }}">
                    <section>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-1">
                                <div class="w-6 h-6 overflow-hidden rounded-full">
                                    <img class="object-cover object-center w-full h-full"
                                        src="{{ asset('/storage/' . auth()->user()->profile_photo_path) }}"
                                        alt="User Profile Photo">
                                </div>
                                <p>{{ auth()->user()->name }}</p>
                            </div>
                            <p>{{ $post->created_at->format('M d, Y') }}</p>
                        </div>
                    </section>
                </a>
                <a href="{{ route('blog.content', ['id' => $post->id]) }}">
                    <section class="flex justify-between gap-5 mt-4 lg:gap-52">
                        <div>
                            <h1 class="font-bold">{{ $post->title }}</h1>
                            <section class="hidden md:block">
                                <p class="truncate line-clamp-2">{!! Str::limit($post->content, 30, '...') !!}</p>
                            </section>
                        </div>
                        <div class="h-24 overflow-hidden ml-full w-36">
                            <img class="object-cover object-top" src="{{ asset('/storage/' . $post->cover) }}"
                                alt="cover">
                        </div>
                    </section>
                    <section class="flex gap-5">
                        <div class="flex items-center gap-1">
                            @svg('phosphor-hands-clapping-thin', 'w-5')
                            {{ $post->likes->count() }}
                        </div>
                        <div class="flex items-center gap-1">
                            @svg('uni-comment-dots-thin', 'w-5')
                            {{ $post->comments->count() }}
                        </div>
                    </section>
                </a>
                {{-- <div class="mt-5">
            <span class="p-2 text-center ">Tags:</span>
            <a href="/sort?tag=programming" class="p-2 text-sm text-center bg-gray-100 rounded-full">Programming</a>
            <a href="/sort?tag=Git" class="p-2 text-sm text-center bg-gray-100 rounded-full">Git</a>
        </div> --}}
            </article>
        @endforeach
        @if ($posts->hasPages())
            {{ $posts->links() }}
        @endif
    @else
        <div class="justify-between 2xl:flex">
            <div class="p-5">
                <div class="flex w-[200px] gap-2">
                    <div class="mb-5 overflow-hidden rounded-full w-7 h-7">
                        <img class="object-cover object-center w-full h-full"
                            src="{{ asset('/storage/' . auth()->user()->profile_photo_path) }}" alt="User Profile Photo">
                    </div>
                    <p>{{ auth()->user()->name }}</p>
                </div>
                <h1 class="my-3 font-bold">Blog Post</h1>
                <P>No stories @svg('css-lock', ['class' => 'w-3 h-3 inline-block ml-2'])</P>
            </div>
            <div class="flex gap-1 mt-5 lg:m-0">
                <div class="w-32 h-20 bg-gray-100 lg:h-full"></div>
                <div class="h-20 bg-gray-100 w-28 lg:h-full"></div>
                <div class="w-20 h-20 bg-gray-100 lg:h-full"></div>
            </div>
        </div>
    @endif
@endsection
