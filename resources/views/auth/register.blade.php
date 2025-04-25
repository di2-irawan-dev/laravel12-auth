@extends('auth.layout')

@section('title', 'Register - ' . config('app.name'))

@section('content')
    <h2 class="text-xl font-semibold mb-1">Create an account</h2>
    <p class="text-sm text-gray-600 mb-4">Enter your details below to create your account</p>
    <div class="border-t border-gray-200 my-4"></div>
    <form action="{{ route('register') }}" method="POST" class="space-y-4 text-sm">
        @csrf

        {{-- Name --}}
        <div class="space-y-1">
            <label for="name" class="block font-medium text-gray-800">Name</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}" placeholder="Full name"
                class="block w-full px-3 py-1.5 border rounded-md shadow-sm focus:ring-1 focus:outline-none text-sm
            {{ $errors->has('name') ? 'border-red-500 focus:ring-red-500' : 'border-gray-300 focus:ring-gray-500' }}" />
            @error('name')
                <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
            @enderror
        </div>

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
        </div>

        {{-- Confirm Password --}}
        <div class="space-y-1">
            <label for="password_confirmation" class="block font-medium text-gray-800">Confirm Password</label>
            <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Confirm password"
                class="block w-full px-3 py-1.5 border rounded-md shadow-sm focus:ring-1 focus:outline-none text-sm
            {{ $errors->has('password_confirmation') ? 'border-red-500 focus:ring-red-500' : 'border-gray-300 focus:ring-gray-500' }}" />
            @error('password_confirmation')
                <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit"
            class="w-full bg-gray-900 hover:bg-gray-800 text-white font-semibold py-1.5 px-3 rounded-md text-sm">
            Create account
        </button>

        <p class="mt-2 text-center text-sm text-gray-600">
            Already have an account?
            <a href="{{ route('login') }}" class="font-semibold text-gray-950 hover:underline">Log in</a>
        </p>

    </form>
@endsection
