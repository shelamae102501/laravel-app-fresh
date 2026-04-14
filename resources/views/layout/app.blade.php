<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Laravel App')</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="bg-gray-50 text-gray-900 min-h-screen">

<nav class="bg-white shadow-md px-6 py-4 flex items-center gap-6">
    <a href="/" class="font-bold text-lg text-blue-600">🏠 Laravel App</a>
    <a href="/" class="text-gray-600 hover:text-blue-600 font-medium">Home</a>
    <a href="/about" class="text-gray-600 hover:text-blue-600 font-medium">About</a>
    <a href="/contact" class="text-gray-600 hover:text-blue-600 font-medium">Contact</a>
    <a href="/formtest" class="text-gray-600 hover:text-blue-600 font-medium">Form Test</a>
    <a href="/posts" class="text-gray-600 hover:text-blue-600 font-medium">Posts</a>
    <a href="/users" class="text-gray-600 hover:text-blue-600 font-medium">Users</a>
    <a href="{{ route('books.index') }}" class="text-gray-600 hover:text-blue-600 font-medium">Books</a>
</nav>

<main class="p-6">
    @yield('content')
</main>

</body>
</html>