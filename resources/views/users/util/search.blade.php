@extends('Layout.app')

@section('content')
    <section class="p-8 m-auto xl:w-2/3">
        <div class="flex items-center mb-16 -z-10 md:hidden">
            <form action="{{ route('search') }}" class="flex item-center">
                <input name="q" type="text" class="w-full px-4 py-3 pl-5 bg-gray-100 rounded-full"
                    placeholder="Search Blog">
                <button type="submit" class="mt-3 ml-4 w-28">@svg('css-search', ['class' => 'w-8 h-8 opacity-60'])</button>
            </form>
        </div>
        @if ($posts->count() != 0)
            @foreach ($posts as $post)
                <article class="pb-4 border-b-[1px] border-gray-200 mb-3">
                    <!-- This section will be dynamic -->
                    <a href="{{ route('guestProfile', ['username' => $post->user->username]) }}">
                        <section>
                            <div class="flex items-center justify-between">
                                <div class="flex items-center gap-1">
                                    <div class="overflow-hidden rounded-full w-7 h-7">
                                        <img class="object-cover object-center w-full h-full"
                                            src="{{ asset('/storage/' . $post->user->profile_photo_path) }}"
                                            alt="User Profile Photo">
                                    </div>
                                    <p>{{ $post->user->name }}</p>
                                </div>
                                <p>{{ $post->created_at->format('M d, Y') }}</p>
                            </div>
                        </section>
                    </a>
                    <a href="{{ route('blog.content', ['id' => $post->id]) }}">
                        <section class="flex justify-between gap-5 mt-4 lg:gap-52">
                            <div>
                                <h1 class="text-xl font-bold">{{ $post->title }}</h1>
                                <section class="hidden md:block">
                                    <p class="truncate line-clamp-2">{!! Str::limit($post->content, 50) !!}</p>
                                </section>

                            </div>
                            <div class="h-24 overflow-hidden w-36">
                                <img class="object-cover object-top h-full" src="{{ asset('/storage/' . $post->cover) }}"
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
            <span class="p-2 text-center">Tags:</span>
            @foreach ($post->tags as $tag)
                <a href="/sort?tag={{ $tag->name }}"
                    class="p-2 text-sm text-center bg-gray-100 rounded-full">{{ $tag->name }}</a>
            @endforeach
        </div> --}}
                </article>
            @endforeach
            @if ($posts->hasPages())
                {{ $posts->links() }}
            @endif
        @else
            <div class="flex items-center gap-8">
                <h3 class="mt-5 text-2xl font-bold">Recent searches</h3>
            </div>
            <main class="my-4 mt-10 text-sm text-gray-500 rounded-lg">
                <p> No results found for <span class="font-bold">{{ $search }}</span></p>
            </main>
        @endif
    </section>
@endsection
