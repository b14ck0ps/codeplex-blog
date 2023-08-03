@extends('Layout.skeleton.guest_profile')
@section('dashboard-content')
    <main class="p-5 m-auto mt-5">
        @foreach ($posts as $post)
            <article class="pb-4 border-b-[1px] border-gray-200 mb-5">
                <a href="{{ route('guestProfile', ['username' => $user->username]) }}">
                    <section>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-1">
                                <div class="w-6 h-6 overflow-hidden rounded-full">
                                    <img class="object-cover object-center w-full h-full"
                                        src="{{ Str::startsWith($post->user->profile_photo_path, 'http') ? $post->user->profile_photo_path : asset('/storage/' . $post->user->profile_photo_path) }}"
                                        alt="User Profile Photo">
                                </div>
                                <p>{{ $user->name }}</p>
                            </div>
                            <p>{{ $post->created_at->format('M d, Y') }}</p>
                        </div>
                    </section>
                </a>
                <a href="{{ route('blog.content', ['id' => $post->id]) }}">
                    <section class="flex justify-between gap-5 mt-4 lg:gap-52">
                        <div>
                            <h1 class="font-bold">{{ $post->title }}</h1>
                            <section class="hidden overflow-hidden md:block md:max-h-12">
                                <p class="line-clamp-2">{!! Str::limit($post->content, 100, '...') !!}</p>
                            </section>
                        </div>
                        <div class="h-24 overflow-hidden ml-full w-36">
                            <img class="object-cover object-top"
                                src="{{ Str::startsWith($post->cover, 'http') ? $post->cover : asset('/storage/' . $post->cover) }}"
                                alt="cover">
                            <div>
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
    </main>
@endsection
