@extends('layout.app')
@section('title', 'Book Management System')
@section('content')
<div class="max-w-7xl mx-auto">
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-3xl font-bold text-gray-900">📚 Book Management System</h1>
            <p class="text-sm text-gray-500 mt-1">Manage your collection</p>
        </div>
        <a href="{{ route('books.create') }}" class="bg-blue-600 text-white px-5 py-2.5 rounded-lg font-semibold hover:bg-blue-700 transition">+ Add Book</a>
    </div>

    @if(session('success'))
        <div class="mb-4 p-4 bg-green-100 border border-green-300 text-green-800 rounded-lg">
            {{ session('success') }}
        </div>
    @endif

    <form method="GET" action="{{ route('books.index') }}" class="flex gap-3 mb-6">
        <input type="text" name="search" class="flex-1 px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500" placeholder="Search by title or author..." value="{{ request('search') }}">
        <select name="genre" class="px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
            <option value="">-- Filter by Genre --</option>
            @foreach($genres as $genre)
                <option value="{{ $genre }}" {{ request('genre') == $genre ? 'selected' : '' }}>{{ $genre }}</option>
            @endforeach
        </select>
        <button type="submit" class="bg-gray-800 text-white px-5 py-2.5 rounded-lg font-semibold hover:bg-gray-900 transition">Search</button>
        <a href="{{ route('books.index') }}" class="bg-gray-200 text-gray-700 px-5 py-2.5 rounded-lg font-semibold hover:bg-gray-300 transition">Reset</a>
    </form>

    <div class="bg-white shadow-md rounded-xl overflow-hidden">
        <table class="w-full text-sm">
            <thead class="bg-gray-100 text-gray-600 uppercase text-xs">
                <tr>
                    <th class="px-6 py-4 text-left">Title</th>
                    <th class="px-6 py-4 text-left">Author</th>
                    <th class="px-6 py-4 text-left">Genre</th>
                    <th class="px-6 py-4 text-left">Price</th>
                    <th class="px-6 py-4 text-left">Available</th>
                    <th class="px-6 py-4 text-left">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse($books as $book)
                <tr class="hover:bg-gray-50 transition">
                    <td class="px-6 py-4 font-medium text-gray-900">{{ $book->title }}</td>
                    <td class="px-6 py-4 text-gray-600">{{ $book->author }}</td>
                    <td class="px-6 py-4">
                        <span class="bg-blue-100 text-blue-700 px-2 py-1 rounded-full text-xs font-medium">{{ $book->genre }}</span>
                    </td>
                    <td class="px-6 py-4 text-gray-700">₱{{ number_format($book->price, 2) }}</td>
                    <td class="px-6 py-4">
                        @if($book->is_available)
                            <span class="bg-green-100 text-green-700 px-2 py-1 rounded-full text-xs font-medium">✅ Yes</span>
                        @else
                            <span class="bg-red-100 text-red-700 px-2 py-1 rounded-full text-xs font-medium">❌ No</span>
                        @endif
                    </td>
                    <td class="px-6 py-4 flex gap-2">
                        <a href="{{ route('books.show', $book) }}" class="bg-blue-50 text-blue-600 px-3 py-1.5 rounded-lg text-xs font-semibold hover:bg-blue-100 transition">View</a>
                        <a href="{{ route('books.edit', $book) }}" class="bg-yellow-50 text-yellow-600 px-3 py-1.5 rounded-lg text-xs font-semibold hover:bg-yellow-100 transition">Edit</a>
                        <form action="{{ route('books.destroy', $book) }}" method="POST" class="inline" onsubmit="return confirm('Delete this book?')">
                            @csrf
                            @method('DELETE')
                            <button class="bg-red-50 text-red-600 px-3 py-1.5 rounded-lg text-xs font-semibold hover:bg-red-100 transition">Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="px-6 py-12 text-center text-gray-400">No books found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $books->withQueryString()->links() }}
    </div>
</div>
@endsection