@extends('layout.app')
@section('title', 'Form Test')
@section('content')
<div class="max-w-xl mx-auto">
    <div class="mb-6">
        <h1 class="text-3xl font-bold text-gray-900">📝 Text Manager</h1>
        <p class="text-sm text-gray-500 mt-1">Demonstration purposes</p>
    </div>

    <div class="bg-white shadow-md rounded-xl p-6 mb-6">
        <form method="POST" action="/formtest" class="space-y-4">
            @csrf
            <div>
                <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Post</label>
                <input
                    id="description"
                    type="text"
                    name="description"
                    required
                    placeholder="Enter your post here..."
                    class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                />
            </div>
            <button type="submit" class="w-full bg-blue-600 text-white py-2.5 rounded-lg font-semibold hover:bg-blue-700 transition">
                Save Post
            </button>
        </form>
    </div>

    <div class="bg-white shadow-md rounded-xl p-6">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-lg font-bold text-gray-800">Saved Posts</h2>
            <span class="bg-blue-100 text-blue-700 text-xs font-bold px-3 py-1 rounded-full uppercase">
                {{ count($posts) }} Total
            </span>
        </div>

        <ul class="space-y-3">
            @forelse ($posts as $post)
                <li class="flex items-center justify-between bg-gray-50 px-4 py-3 rounded-lg border border-gray-100 hover:bg-gray-100 transition group">
                    <div class="flex items-center gap-3">
                        <div class="h-2 w-2 rounded-full bg-blue-400"></div>
                        <span class="text-sm text-gray-800 font-medium">{{ $post->description }}</span>
                    </div>
                    <form method="POST" action="/formtest/{{ $post->id }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-gray-300 hover:text-red-500 transition group-hover:text-gray-400">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            </svg>
                        </button>
                    </form>
                </li>
            @empty
                <div class="text-center py-10 rounded-lg border border-dashed border-gray-200">
                    <p class="text-gray-400 text-sm font-medium">No records found.</p>
                </div>
            @endforelse
        </ul>
    </div>
</div>
@endsection