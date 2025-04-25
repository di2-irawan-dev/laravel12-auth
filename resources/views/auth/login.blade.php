@extends('auth.layout')

@section('title', 'Login - ' . config('app.name'))

@section('content')
    <h2 class="text-xl text-gray-900 font-semibold mb-1">Log in to your account</h2>
    <p class="text-sm text-gray-600 mb-4">Enter your email and password below to log in</p>
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

    <form action="{{ route('login') }}" method="POST" class="space-y-4 text-sm">
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

        {{-- Password --}}
        <div class="space-y-1">
            <label for="password" class="block font-medium text-gray-800">Password</label>
            <input type="password" id="password" name="password" placeholder="Password"
                class="block w-full px-3 py-1.5 border rounded-md shadow-sm focus:ring-1 focus:outline-none text-sm
            {{ $errors->has('password') ? 'border-red-500 focus:ring-red-500' : 'border-gray-300 focus:ring-gray-500' }}" />
            @error('password')
                <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
            @enderror
            <div class="text-right">
                <a href="{{ route('password.request') }}" class="text-sm text-gray-600 hover:underline">Forgot
                    Password?</a>
            </div>
        </div>

        <button type="submit"
            class="w-full bg-gray-900 hover:bg-gray-800 text-white font-semibold py-1.5 px-3 rounded-md text-sm">
            Log in
        </button>

        @if (Route::has('register'))
            <p class="mt-2 text-center text-sm text-gray-600">
                Don’t have an account?
                <a href="{{ route('register') }}" class="font-semibold text-gray-950 hover:underline">Sign up</a>
            </p>
        @endif
    </form>
@endsection
