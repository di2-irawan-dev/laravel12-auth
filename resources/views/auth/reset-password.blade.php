@extends('auth.layout')

@section('title', 'Reset password - ' . config('app.name'))

@section('content')
    <h2 class="text-xl font-semibold mb-1">Reset password</h2>
    <p class="text-sm text-gray-600 mb-4">Please enter your new password below</p>
    <div class="border-t border-gray-200 my-4"></div>

    <form action="{{ route('password.update') }}" method="POST" class="space-y-4 text-sm">
        @csrf
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        {{-- Email --}}
        <div class="space-y-1">
            <label for="email" class="block font-medium text-gray-800">E-mail</label>
            <input type="email" id="email" name="email" value="{{ old('email', $request->email) }}"
                placeholder="email@example.com"
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
            Reset password
        </button>

    </form>
@endsection
