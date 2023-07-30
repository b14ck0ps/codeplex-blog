@extends('Layout.app')
@section('content')
    <main class="p-5 mx-auto sm:w-3/4 ">
        <h1 class="text-3xl font-bold sm:text-5xl">{{ $post->title }}</h1>
        <div class="px-2 py-5 my-10 mb-20 bg-gray-100 rounded-lg">{!! $post->content !!}</div>
        {{-- <img class="w-2/12 mx-auto my-8" src="{{ asset('/storage/' . $post->cover) }}" alt="cover"> --}}
    </main>
    <footer
        class="fixed bottom-0 flex justify-around w-full py-3 bg-white border-t-2 border-opacity-25 border-t-gray-200 sm:py-5">
        <form action="{{ route('blog.like', ['id' => $post->id]) }}" method="POST">
            @csrf
            <button class="flex items-center gap-1">
                @if ($existingLike)
                    @svg('fas-hands-clapping', 'w-5')
                    {{ $likes }}
                @else
                    @svg('phosphor-hands-clapping-thin', 'w-5')
                    {{ $likes }}
                @endif
            </button>
        </form>
        <button type="button" data-drawer-target="drawer-comment" data-drawer-show="drawer-comment"
            aria-controls="drawer-comment" class="flex items-center gap-1">
            @svg('uni-comment-dots-thin', 'w-5')
            {{ $comments->count() }}
        </button>
    </footer>

    <!-- drawer component -->
    <div id="drawer-comment"
        class="fixed top-0 left-0 z-40 h-screen p-4 overflow-y-auto transition-transform -translate-x-full bg-white rounded-t-lg w-80 xl:w-[400px]"
        tabindex="-1" aria-labelledby="drawer-label">
        <button type="button" data-drawer-hide="drawer-comment" aria-controls="drawer-comment"
            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 absolute top-2.5 right-2.5 inline-flex items-center justify-center dark:hover:bg-gray-600 dark:hover:text-white">
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
            </svg>
            <span class="sr-only">Close menu</span>
        </button>
        {{-- main contents --}}
        <h1 class="pb-5 text-2xl font-semibold border-b-2 border-black border-opacity-20">Response
            ({{ $comments->count() }})
        </h1>

        <form class="pb-10 my-10 border-b-2 border-black border-opacity-20"
            action="{{ route('blog.comment', ['id' => $post->id]) }}" method="POST">
            @csrf
            <div class="flex items-center justify-between gap-2">
                <div class="w-8 h-8 overflow-hidden rounded-full ">
                    <img class="object-cover object-center w-full h-full"
                        src="{{ asset('/storage/' . auth()->user()->profile_photo_path) }}" alt="User Profile Photo">
                </div>
                <input name="comment" type="text" placeholder="Write a comment..."
                    class="w-10/12 p-2 border-2 border-gray-200 rounded-lg">
                <button type="submit">
                    @svg('phosphor-arrow-right-thin', 'w-5')
                </button>
            </div>
        </form>

        @foreach ($comments as $comment)
            <section class="border-b-[1px] border-black border-opacity-10 pb-3 mb-3">
                <section class="flex justify-between">
                    <div class="flex items-center gap-4">
                        <div class="inline-block w-8 h-8 overflow-hidden rounded-full">
                            <img class="object-cover object-center w-full h-full"
                                src="{{ asset('/storage/' . $comment->user->profile_photo_path) }}"
                                alt="User Profile Photo">
                        </div>
                        <div class="flex flex-col justify-center">
                            <p>{{ $comment->user->name }}</p>
                            <span class="text-sm text-gray-400">{{ $comment->created_at->format('M d, Y') }}</span>
                        </div>
                    </div>

                    @if ($comment->user_id == auth()->user()->id)
                        <form action="{{ route('blog.comment.delete', ['id' => $comment->id]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">
                                @svg('uiw-delete', 'w-5')
                            </button>
                        </form>
                    @endif

                </section>
                <p class="mt-5 text-gray-500">{{ $comment->comment }}</p>
            </section>
        @endforeach
    </div>
@endsection
