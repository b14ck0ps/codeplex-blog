@extends('Layout.skeleton.dashboard')
@section('dashboard-content')
    @if (auth()->user()->about)
        <p class="p-5">
            {{ auth()->user()->about }}
        </p>
    @else
        <h1 class="p-5 mt-10 mb-3 font-bold text-center">
            Tell the world about yourself
        </h1>
        <p class="text-[0.8rem] text-center 2xl:px-36 lg:text-[1rem] sm:px-20 p-10">
            Here's where you can share more about yourself: your history, work experience, accomplishments, interests,
            dreams,
            and more. You can even add images and use rich text to personalize your bio.
        </p>
        <div class="flex justify-center">
            <button class="block px-5 py-2 mt-5 mb-10 text-center border border-black rounded-full">
                Get started
            </button>
        </div>
    @endif
@endsection
