@extends('auth.layout')

@section('title', 'Home - ' . config('app.name'))

@section('content')

    <div class="flex justify-between items-center mt-2">
        <h1 class="text-md">
            Welcome, <span class="font-bold">{{ Auth::user()->email }}</span>
        </h1>
        <button onclick="event.preventDefault(); document.getElementById('logout-form').submit()"
            class="px-4 py-1 bg-red-600 text-white rounded hover:bg-red-700 transition">
            Logout
        </button>
    </div>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
        @csrf
    </form>

@endsection
