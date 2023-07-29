@extends('Layout.skeleton.setting')
@section('setting-content')
    <table class="w-full border-separate border-spacing-y-5 md:border-spacing-y-10">
        <tr data-drawer-target="drawer-bottom-email" data-drawer-show="drawer-bottom-email" data-drawer-placement="bottom"
            aria-controls="drawer-bottom-email" aria-hidden="true"
            onclick="document.querySelector('#drawer-bottom-email').removeAttribute('hidden')">
            <td class="pr-10 text-sm text-left">Email Address</td>
            <td class="text-sm text-right text-gray-500">{{ auth()->user()->email }}</td>
        </tr>
        <tr data-drawer-target="drawer-bottom-profileInfo" data-drawer-show="drawer-bottom-profileInfo"
            data-drawer-placement="bottom" aria-controls="drawer-bottom-profileInfo" aria-hidden="true"
            onclick="document.querySelector('#drawer-bottom-profileInfo').removeAttribute('hidden')"">
            <td class="pr-10 text-sm text-left">Profile Info</td>
            <td class="text-sm text-right text-gray-500">{{ auth()->user()->name }}
                <img class="inline w-5 ml-5 rounded-full" src="{{ asset('images/707.jpg') }}" alt="707">
            </td>
        </tr>
        <tr data-drawer-target="drawer-bottom-username" data-drawer-show="drawer-bottom-username"
            data-drawer-placement="bottom" aria-controls="drawer-bottom-username" aria-hidden="true"
            onclick="document.querySelector('#drawer-bottom-username').removeAttribute('hidden')"">
            <td class="pr-10 text-sm text-left">Username</td>
            <td class="text-sm text-right text-gray-500">{{ auth()->user()->username }}</td>
        </tr>
    </table>
@endsection

<!-- drawer email -->
<div id="drawer-bottom-email"
    class="fixed -bottom-1 left-0 right-0 z-40 w-full h-[90vh] p-4 overflow-y-auto transition-transform bg-white transform-none rounded-t-2xl "
    data-drawer-hidden="true" hidden>

    <button type="button" data-drawer-hide="drawer-bottom-email" aria-controls="drawer-bottom-email"
        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 absolute top-2.5 left-2.5 inline-flex items-center justify-center">
        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
        </svg>
        <span class="sr-only">Close menu</span>
    </button>
    <form action="/setting" method="post">
        <button type="submit"
            class="px-4 py-1 bg-green-500 hover:bg-green-600 absolute top-2.5 right-2.5 inline-flex items-center justify-center rounded-full">save</button>

        <div class="mt-10">
            <h3 class="text-xl font-bold">Email Address</h3>
            <input type="email"
                class="border-b-[0.5px] border-black focus: outline-none mt-5 w-full border-opacity-50"
                value="{{ auth()->user()->email }}">
            <p class="mt-3 text-sm text-gray-500">you can change your email address</p>
        </div>
    </form>

</div>
<!-- drawer username -->
<div id="drawer-bottom-username"
    class="fixed -bottom-1 left-0 right-0 z-40 w-full h-[90vh] p-4 overflow-y-auto transition-transform bg-white transform-none rounded-t-2xl "
    data-drawer-hidden="true" hidden>

    <button type="button" data-drawer-hide="drawer-bottom-username" aria-controls="drawer-bottom-username"
        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 absolute top-2.5 left-2.5 inline-flex items-center justify-center">
        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
        </svg>
        <span class="sr-only">Close menu</span>
    </button>
    <form action="/setting" method="post">
        <button type="submit"
            class="px-4 py-1 bg-green-500 hover:bg-green-600 absolute top-2.5 right-2.5 inline-flex items-center justify-center rounded-full">save</button>

        <div class="mt-10">
            <h3 class="text-xl font-bold">User Name</h3>
            <input type="email"
                class="border-b-[0.5px] border-black focus: outline-none mt-5 w-full border-opacity-50"
                value="{{ auth()->user()->username }}">
            <p class="mt-3 text-sm text-gray-500">you can change your username</p>
        </div>
    </form>
</div>

<!-- drawer profileInfo -->
<div id="drawer-bottom-profileInfo"
    class="fixed -bottom-1 left-0 right-0 z-40 w-full h-[90vh] p-4 overflow-y-auto transition-transform bg-white transform-none rounded-t-2xl "
    data-drawer-hidden="true" hidden>

    <button type="button" data-drawer-hide="drawer-bottom-profileInfo" aria-controls="drawer-bottom-profileInfo"
        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 absolute top-2.5 left-2.5 inline-flex items-center justify-center">
        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
        </svg>
        <span class="sr-only">Close menu</span>
    </button>
    <form action="/setting" method="post">
        <button type="submit"
            class="px-4 py-1 bg-green-500 hover:bg-green-600 absolute top-2.5 right-2.5 inline-flex items-center justify-center rounded-full">save</button>

        <div class="mt-10">
            <h3 class="mb-5 text-xl font-bold">Profile Information</h3>
            <label class="block mb-2 text-sm text-gray-500" for="photo">Photo</label>
            <div class="flex items-center gap-10">
                <img class="w-20 rounded-full" src="{{ asset('images/707.jpg') }}" alt="">
                <div>
                    <input type="file">
                    <p class="mt-3 text-sm text-gray-500">Recomanded : JPG or PNG, Max 500KB</p>
                </div>
            </div>
            <div class="mt-10">
                <label class="block mb-2 text-sm text-gray-500" for="name">Name</label>
                <input type="text"
                    class="border-b-[0.5px] border-black focus: outline-none mt-5 w-full border-opacity-50"
                    value="{{ auth()->user()->name }}">
                    <p class="mt-3 text-sm text-gray-500">
                        Appears on your profile page and responses.
                    </p>
            </div>
        </div>
    </form>
</div>
<!-- drawer about -->
<div id="drawer-bottom-about"
    class="fixed -bottom-1 left-0 right-0 z-40 w-full h-[90vh] p-4 overflow-y-auto transition-transform bg-white transform-none rounded-t-2xl "
    data-drawer-hidden="true" hidden>

    <button type="button" data-drawer-hide="drawer-bottom-about" aria-controls="drawer-bottom-about"
        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 absolute top-2.5 left-2.5 inline-flex items-center justify-center">
        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
        </svg>
        <span class="sr-only">Close menu</span>
    </button>
    <form action="/setting" method="post">
        <button type="submit"
            class="px-4 py-1 bg-green-500 hover:bg-green-600 absolute top-2.5 right-2.5 inline-flex items-center justify-center rounded-full">save</button>

        <div class="mt-10">
            <h3 class="text-xl font-bold">About</h3>
            <input type="text"
                class="border-b-[0.5px] border-black focus: outline-none mt-5 w-full border-opacity-50"
                value="">
            <p class="mt-3 text-sm text-gray-500">tell us about yourself</p>
        </div>
    </form>
</div>
