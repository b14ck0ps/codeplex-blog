@extends('Layout.app')
@section('content')
    <main class="p-5 m-auto mt-5 lg:w-3/5">
        <form action="{{ route('blog.sort') }}" method="POST" id="sortForm">
            @csrf

            <select name="sortBy" id="sortSelect"
                class="block w-full p-2 mb-6 text-sm text-gray-900 border border-gray-300 rounded-lg md:w-96 bg-gray-50 focus:ring-blue-500 focus:border-blue-500">
                <option value="latest" @if ($selected === 'latest') selected @endif>Latest Posts</option>
                <option value="likes" @if ($selected === 'likes') selected @endif>Hot Posts</option>
                <option value="oldest" @if ($selected === 'oldest') selected @endif>Oldest Posts</option>
            </select>
            </select>
        </form>
        @foreach ($posts as $post)
            <article class="pb-4 border-b-[1px] border-gray-200 mb-3">
                <!-- This section will be dynamic -->
                <a href="{{ route('guestProfile', ['username' => $post->user->username]) }}">
                    <section>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-1">
                                <div class="overflow-hidden rounded-full w-7 h-7">
                                    <img class="object-cover object-center w-full h-full"
                                        src="{{ Str::startsWith($post->user->profile_photo_path, 'http') ? $post->user->profile_photo_path : asset('/storage/' . $post->user->profile_photo_path) }}"
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
                        <div class="h-24 overflow-hidden ml-full w-36">
                            <img class="object-cover object-top"
                                src="{{ Str::startsWith($post->cover, 'http') ? $post->cover : asset('/storage/' . $post->cover) }}"
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
    </main>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('sortSelect').addEventListener('change', function() {
                document.getElementById('sortForm').submit();
            });
        });
    </script>
@endsection
