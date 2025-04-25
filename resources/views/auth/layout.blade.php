<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, viewport-fit=cover">
    <title>@yield('title', config('app.name'))</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 flex flex-col items-center justify-center min-h-screen px-4">

    <a href="/" class="text-2xl font-bold mb-4 text-center hover:underline">
        {{ config('app.name') }}
    </a>

    <div class="bg-white p-4 sm:p-6 rounded-lg shadow-md w-full max-w-md">
        @yield('content')
    </div>

</body>

</html>
