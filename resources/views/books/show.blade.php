@extends('layout.app')
@section('title', $book->title)
@section('content')
<div class="max-w-3xl mx-auto">
    <div class="mb-6">
        <a href="{{ route('books.index') }}" class="text-blue-600 hover:underline text-sm">← Back to Books</a>
        <h1 class="text-3xl font-bold text-gray-900 mt-2">📗 {{ $book->title }}</h1>
    </div>

    <div class="bg-white shadow-md rounded-xl p-6">
        @if($book->cover_image)
            <img src="{{ asset('storage/' . $book->cover_image) }}" class="h-48 rounded-xl mb-6">
        @endif

        <div class="divide-y divide-gray-100">
            @foreach([
                'Author' => $book->author,
                'Genre' => $book->genre,
                'Description' => $book->description,
                'Published Year' => $book->published_year,
                'ISBN' => $book->isbn,
                'Pages' => $book->pages,
                'Language' => $book->language,
                'Publisher' => $book->publisher,
                'Price' => '₱' . number_format($book->price, 2),
            ] as $label => $value)
            <div class="flex py-3 gap-4">
                <span class="text-xs font-semibold text-gray-500 uppercase tracking-wide w-36 shrink-0">{{ $label }}</span>
                <span class="text-gray-800">{{ $value }}</span>
            </div>
            @endforeach
            <div class="flex py-3 gap-4">
                <span class="text-xs font-semibold text-gray-500 uppercase tracking-wide w-36 shrink-0">Available</span>
                <span>
                    @if($book->is_available)
                        <span class="bg-green-100 text-green-700 px-2 py-1 rounded-full text-xs font-medium">✅ Yes</span>
                    @else
                        <span class="bg-red-100 text-red-700 px-2 py-1 rounded-full text-xs font-medium">❌ No</span>
                    @endif
                </span>
            </div>
        </div>

        <div class="flex gap-3 mt-6">
            <a href="{{ route('books.edit', $book) }}" class="bg-yellow-400 text-white px-5 py-2.5 rounded-lg font-semibold hover:bg-yellow-500 transition">✏️ Edit</a>
            <form action="{{ route('books.destroy', $book) }}" method="POST" onsubmit="return confirm('Delete this book?')">
                @csrf
                @method('DELETE')
                <button class="bg-red-500 text-white px-5 py-2.5 rounded-lg font-semibold hover:bg-red-600 transition">🗑️ Delete</button>
            </form>
        </div>
    </div>
</div>
@endsection