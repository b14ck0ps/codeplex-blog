@extends('Layout.app')
@section('content')
    <main class="p-5 m-auto mt-5 lg:w-3/5">
        @foreach ($posts as $post)
            <article class="pb-4 border-b-[1px] border-gray-200">
                <!-- This section will be dynamic -->
                <a href="{{ route('guestProfile', ['id' => $post->user->id]) }}">
                    <section>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-1">
                                <img class="w-6 rounded-full" src="{{ asset('images/707.jpg') }}" alt="dp">
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
