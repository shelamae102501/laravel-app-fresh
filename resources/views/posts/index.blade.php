@extends('layout.app')
@section('title', 'Post Management System')
@section('content')
<div class="max-w-xl mx-auto">

    <div class="bg-white shadow-md rounded-xl p-8 mb-6">
        <div class="flex items-center gap-4 mb-6">
            <div class="p-3 bg-indigo-100 rounded-xl">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                </svg>
            </div>
            <div>
                <h1 class="text-2xl font-bold text-gray-900">Post Management System</h1>
                <p class="text-xs text-indigo-500 uppercase tracking-widest font-bold">Demonstration purposes</p>
            </div>
        </div>

        <form method="POST" action="/formtest">
            @csrf
            <div>
                <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Post</label>
                <input
                    id="description"
                    type="text"
                    name="description"
                    required
                    placeholder="Enter your post here..."
                    class="w-full rounded-lg border border-gray-300 px-4 py-2.5 text-sm text-gray-900 focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                />
            </div>
            <div class="mt-4 flex justify-end">
                <button type="submit" class="bg-blue-600 text-white px-8 py-2.5 rounded-lg text-sm font-semibold hover:bg-blue-700 transition">
                    Save Post
                </button>
            </div>
        </form>
    </div>

    <div class="bg-white shadow-md rounded-xl p-8">
        <div class="flex items-center justify-between mb-6">
            <h2 class="text-lg font-bold text-gray-800">Saved Posts</h2>
            <span class="bg-blue-100 text-blue-700 text-xs font-bold px-3 py-1 rounded-full uppercase">
                {{ count($posts) }} Total
            </span>
        </div>

        <ul class="space-y-3">
            @forelse ($posts as $post)
                <li class="group flex items-center justify-between bg-gray-50 hover:bg-gray-100 px-4 py-3 rounded-lg border border-gray-100 transition">
                    <div class="flex items-center gap-3">
                        <div class="h-2 w-2 rounded-full bg-blue-400"></div>
                        <span class="text-sm font-medium text-gray-800">{{ $post->description }}</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <a href="/posts/{{ $post->id }}/edit"
                            class="opacity-0 group-hover:opacity-100 transition text-gray-400 hover:text-blue-500 p-1">
                            ✏️
                        </a>
                        <form method="POST" action="/formtest/{{ $post->id }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="opacity-0 group-hover:opacity-100 transition text-gray-400 hover:text-red-500 p-1">
                                🗑
                            </button>
                        </form>
                    </div>
                </li>
            @empty
                <div class="text-center py-12 rounded-lg border border-dashed border-gray-200">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-gray-300 mx-auto mb-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                    </svg>
                    <p class="text-gray-400 text-sm font-medium">No records found.</p>
                </div>
            @endforelse
        </ul>
    </div>

    <p class="text-center text-xs text-gray-400 uppercase tracking-widest font-bold mt-8">
        University of Mindanao • Data Systems
    </p>
</div>
@endsection