@extends('layout.app')
@section('title', 'Edit Book')
@section('content')
<div class="max-w-3xl mx-auto">
    <div class="mb-6">
        <a href="{{ route('books.index') }}" class="text-blue-600 hover:underline text-sm">← Back to Books</a>
        <h1 class="text-3xl font-bold text-gray-900 mt-2">✏️ Edit Book</h1>
    </div>

    @if($errors->any())
        <div class="mb-4 p-4 bg-red-100 border border-red-300 text-red-800 rounded-lg">
            <ul class="list-disc list-inside">
                @foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach
            </ul>
        </div>
    @endif

    <div class="bg-white shadow-md rounded-xl p-6">
        <form action="{{ route('books.update', $book) }}" method="POST" enctype="multipart/form-data" class="space-y-5">
            @csrf
            @method('PUT')
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Title *</label>
                    <input type="text" name="title" class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 @error('title') border-red-500 @enderror" value="{{ old('title', $book->title) }}">
                    @error('title')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Author *</label>
                    <input type="text" name="author" class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 @error('author') border-red-500 @enderror" value="{{ old('author', $book->author) }}">
                    @error('author')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Description *</label>
                <textarea name="description" rows="3" class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 @error('description') border-red-500 @enderror">{{ old('description', $book->description) }}</textarea>
                @error('description')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Genre *</label>
                    <select name="genre" class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 @error('genre') border-red-500 @enderror">
                        <option value="">-- Select Genre --</option>
                        @foreach(['Fiction','Non-Fiction','Sci-Fi','Fantasy','Mystery','Romance','Horror','Biography','History','Self-Help'] as $g)
                            <option value="{{ $g }}" {{ old('genre', $book->genre) == $g ? 'selected' : '' }}>{{ $g }}</option>
                        @endforeach
                    </select>
                    @error('genre')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Published Year *</label>
                    <input type="number" name="published_year" class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 @error('published_year') border-red-500 @enderror" value="{{ old('published_year', $book->published_year) }}">
                    @error('published_year')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">ISBN *</label>
                    <input type="text" name="isbn" class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 @error('isbn') border-red-500 @enderror" value="{{ old('isbn', $book->isbn) }}">
                    @error('isbn')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Pages *</label>
                    <input type="number" name="pages" class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 @error('pages') border-red-500 @enderror" value="{{ old('pages', $book->pages) }}">
                    @error('pages')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Language *</label>
                    <input type="text" name="language" class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 @error('language') border-red-500 @enderror" value="{{ old('language', $book->language) }}">
                    @error('language')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Publisher *</label>
                    <input type="text" name="publisher" class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 @error('publisher') border-red-500 @enderror" value="{{ old('publisher', $book->publisher) }}">
                    @error('publisher')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Price *</label>
                    <input type="number" step="0.01" name="price" class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 @error('price') border-red-500 @enderror" value="{{ old('price', $book->price) }}">
                    @error('price')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Cover Image</label>
                    @if($book->cover_image)
                        <img src="{{ asset('storage/' . $book->cover_image) }}" class="h-20 rounded-lg mb-2">
                    @endif
                    <input type="file" name="cover_image" class="w-full px-4 py-2.5 border border-gray-300 rounded-lg">
                </div>
            </div>

            <div class="flex items-center gap-2">
                <input type="checkbox" name="is_available" id="is_available" class="w-4 h-4 text-blue-600" {{ old('is_available', $book->is_available) ? 'checked' : '' }}>
                <label for="is_available" class="text-sm font-medium text-gray-700">Available</label>
            </div>

            <button type="submit" class="w-full bg-blue-600 text-white py-3 rounded-lg font-semibold hover:bg-blue-700 transition">Update Book</button>
        </form>
    </div>
</div>
@endsection