@extends('auth.layout')

@section('title', 'Verify Email - ' . config('app.name'))

@section('content')
    <h2 class="text-xl font-semibold mb-1">Verify Your Email Address</h2>
    <p class="text-sm text-gray-600 mb-4">Enter your email and password below to log in</p>
    <div class="border-t border-gray-200 my-4"></div>

    @if (session('status'))
        <div class="flex items-center gap-2 p-3 rounded-md border border-green-300 bg-green-50 text-green-800 text-sm mb-4">
            <svg class="w-5 h-5 text-green-500 shrink-0" fill="none" stroke="currentColor" stroke-width="2"
                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path>
            </svg>
            {{ session('status') }}
        </div>
    @endif

    <p class="text-sm">
        Please verify your email address by clicking on the link we just emailed to you. If you did not receive
        the email, please check your spam folder.
    </p>

    <p class="text-sm mt-4">
        If you did not receive the email,
    </p>

    <form action="{{ route('verification.send') }}" method="POST" class="space-y-4 text-sm">
        @csrf

        <button type="submit"
            class="w-full bg-gray-900 hover:bg-gray-800 text-white font-semibold py-1.5 px-3 rounded-md text-sm">
            click here to request another
        </button>
    </form>

    @if (session('resent'))
        <div class="border-t pt-2 mt-4">
            <div role="alert" class="alert flex items-start text-start p-0 gap-2">
                <span class="text-sm">A fresh verification link has been sent to your email address.</span>
            </div>
        </div>
    @endif

@endsection
