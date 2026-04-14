@extends('layout.app')
@section('title', 'Edit Post')
@section('content')
<div class="max-w-xl mx-auto">
    <div class="bg-white shadow-md rounded-xl p-8">
        <h1 class="text-2xl font-bold text-gray-900 mb-2">📬 Posts Manager</h1>
        <p class="text-sm text-gray-500 mb-6">Demonstration purposes</p>

        <form method="POST" action="/posts/{{ $post->id }}">
            @csrf
            @method('PATCH')

            <div>
                <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Post</label>
                <textarea
                    id="description"
                    name="description"
                    required
                    placeholder="Enter your post here..."
                    class="w-full rounded-lg border border-gray-300 px-4 py-3 text-sm text-gray-900 focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                    rows="4"
                >{{ $post->description }}</textarea>
            </div>

            <div class="mt-6 flex justify-end">
                <button type="submit"
                    class="bg-blue-600 text-white px-8 py-2.5 rounded-lg text-sm font-semibold hover:bg-blue-700 transition">
                    Update Post
                </button>
            </div>
        </form>
    </div>
</div>
@endsection