@extends('Layout.app')

@section('content')
    <section class="p-8 m-auto xl:w-2/3">
        <div class="relative flex items-center -z-10">
            <a href="{{ route('search') }}" class="absolute transform -translate-y-1/2 left-2 top-1/2">
                @svg('css-search', ['class' => 'w-6 h-6 opacity-60'])
            </a>
            <input type="text" class="w-full px-4 py-3 pl-12 bg-gray-100 rounded-full" placeholder="Search Blog">
        </div>
        <div class="flex items-center gap-8">
            <h3 class="mt-5 text-2xl font-bold">Recent searches</h3>
        </div>
        <main class="my-4 mt-10 text-sm text-gray-500 rounded-lg">
            <p>you haven't searched for anything yet.</p>
        </main>
    </section>
@endsection
