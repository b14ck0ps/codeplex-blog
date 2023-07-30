@extends('Layout.app')
@section('content')
    <main class="p-5 mx-auto sm:w-3/4 ">
        <h1 class="text-3xl font-bold sm:text-5xl">{{ $post->title }}</h1>
        <div class="px-2 py-5 my-10 mb-20 bg-gray-100 rounded-lg">{!! $post->content !!}</div>
        {{-- <img class="w-2/12 mx-auto my-8" src="{{ asset('/storage/' . $post->cover) }}" alt="cover"> --}}
    </main>
    <footer
        class="fixed bottom-0 flex justify-around w-full py-3 bg-white border-t-2 border-opacity-25 border-t-gray-200 sm:py-5">
        <button class="flex items-center gap-1">
            @svg('phosphor-hands-clapping-thin', 'w-5')
            8k
        </button>
        <button class="flex items-center gap-1">
            @svg('uni-comment-dots-thin', 'w-5')
            20
        </button>
    </footer>
@endsection
