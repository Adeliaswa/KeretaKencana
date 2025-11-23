@extends('layouts.passenger')

@section('content')

<div class="py-12 w-full flex justify-center">
    <div class="max-w-3xl w-full space-y-6">

        {{-- Update Profile Info --}}
        <div class="p-6 bg-white shadow-lg rounded-2xl">
            @include('profile.partials.update-profile-information-form')
        </div>

        {{-- Update Password --}}
        <div class="p-6 bg-white shadow-lg rounded-2xl">
            @include('profile.partials.update-password-form')
        </div>

        {{-- Delete User --}}
        <div class="p-6 bg-white shadow-lg rounded-2xl">
            @include('profile.partials.delete-user-form')
        </div>

    </div>
</div>

@endsection
