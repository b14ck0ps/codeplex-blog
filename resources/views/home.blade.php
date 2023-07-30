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
                <a href="{{ route('guestProfile', ['id' => $post->user->id]) }}">
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
                                {!! Str::limit($post->content, 150) !!}
                            </section>

                        </div>
                        <img class="w-36" src="{{ asset('/storage/' . $post->cover) }}" alt="cover">
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
    </main>
@endsection

<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('sortSelect').addEventListener('change', function() {
            document.getElementById('sortForm').submit();
        });
    });
</script>
