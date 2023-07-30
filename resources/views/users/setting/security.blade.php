@extends('Layout.skeleton.setting')
@section('setting-content')
    <table class="w-full border-separate border-spacing-y-5 md:border-spacing-y-10">
        <tr class="cursor-pointer" data-drawer-target="drawer-bottom-password" data-drawer-show="drawer-bottom-password"
            data-drawer-placement="bottom" aria-controls="drawer-bottom-password" aria-hidden="true"
            onclick="document.querySelector('#drawer-bottom-password').removeAttribute('hidden')">
            <td class="pr-10 text-sm text-left">Change Password</td>
            <td class="text-sm text-right text-gray-500">****************</td>
        </tr>
    </table>
@endsection

<!-- drawer password -->
<div id="drawer-bottom-password"
    class="fixed -bottom-1 left-0 right-0 z-40 w-full h-[90vh] p-4 overflow-y-auto transition-transform bg-white transform-none rounded-t-2xl "
    data-drawer-hidden="true" hidden>

    <button type="button" data-drawer-hide="drawer-bottom-password" aria-controls="drawer-bottom-password"
        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 absolute top-2.5 left-2.5 inline-flex items-center justify-center">
        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
        </svg>
        <span class="sr-only">Close menu</span>
    </button>
    <form action="{{ route('update.password') }}" method="post">
        @csrf
        <button type="submit"
            class="px-4 py-1 bg-green-500 hover:bg-green-600 absolute top-2.5 right-2.5 inline-flex items-center justify-center rounded-full">save</button>

        <div class="mt-10">
            <h3 class="font-bold ">Old Password</h3>
            <input type="password"
                class="border-b-[0.5px] border-black focus: outline-none mt-5 w-full border-opacity-50"
                name="old_password" value="">
        </div>
        @if ($errors->has('not_matched'))
            <span class="text-red-500">{{ $errors->first('not_matched') }}</span>
        @endif
        <div class="mt-10">
            <h3 class="font-bold ">New Password</h3>
            <input type="password"
                class="border-b-[0.5px] border-black focus: outline-none mt-5 w-full border-opacity-50" name="password"
                value="">
        </div>
        <div class="mt-10">
            <h3 class="font-bold ">Confirm Password</h3>
            <input type="password"
                class="border-b-[0.5px] border-black focus: outline-none mt-5 w-full border-opacity-50"
                name="password_confirmation" value="">
        </div>
        @if ($errors->has('password'))
            <span class="text-red-500">{{ $errors->first('password') }}</span>
        @endif
    </form>
</div>

@if ($errors->any())
    <script>
        document.querySelector('#drawer-bottom-password').removeAttribute('hidden')
    </script>
@endif
