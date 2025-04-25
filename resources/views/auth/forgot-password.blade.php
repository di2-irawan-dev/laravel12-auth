@extends('auth.layout')

@section('title', 'Forgot Password - ' . config('app.name'))

@section('content')
    <h2 class="text-xl font-semibold mb-1">Forgot password</h2>
    <p class="text-sm text-gray-600 mb-4">Enter your email to receive a password reset link</p>
    <div class="border-t border-gray-200 my-4"></div>

    @if (session('status'))
        <div class="flex items-center gap-2 p-3 rounded-md border border-green-300 bg-green-50 text-green-800 text-sm">
            <svg class="w-5 h-5 text-green-500 shrink-0" fill="none" stroke="currentColor" stroke-width="2"
                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path>
            </svg>
            {{ session('status') }}
        </div>
    @endif

    <form action="{{ route('password.email') }}" method="POST" class="space-y-4 text-sm">
        @csrf

        {{-- Email --}}
        <div class="space-y-1">
            <label for="email" class="block font-medium text-gray-800">E-mail</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="email@example.com"
                class="block w-full px-3 py-1.5 border rounded-md shadow-sm focus:ring-1 focus:outline-none text-sm
            {{ $errors->has('email') ? 'border-red-500 focus:ring-red-500' : 'border-gray-300 focus:ring-gray-500' }}" />
            @error('email')
                <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit"
            class="w-full bg-gray-900 hover:bg-gray-800 text-white font-semibold py-1.5 px-3 rounded-md text-sm">
            Email password reset link
        </button>

        @if (Route::has('register'))
            <p class="mt-2 text-center text-sm text-gray-600">
                Or, return to
                <a href="{{ route('login') }}" class="font-semibold text-gray-950 hover:underline">Log in</a>
            </p>
        @endif
    </form>
@endsection
