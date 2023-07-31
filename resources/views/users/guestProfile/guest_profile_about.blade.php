@extends('Layout.skeleton.guest_profile')
@section('dashboard-content')
    <p class="p-3">{{ $user->about ?? 'Empty' }}</p>
@endsection
