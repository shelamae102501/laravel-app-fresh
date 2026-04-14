@extends('layout.app')
@section('title', 'View Post')
@section('content')
<div class="max-w-xl mx-auto">
    <div class="bg-white shadow-md rounded-xl p-8">
        <h1 class="text-2xl font-bold text-gray-900 mb-6">📬 Posts Manager</h1>

        <div class="bg-gray-50 border border-gray-100 rounded-lg px-6 py-4">
            <p class="text-sm text-gray-500 uppercase tracking-widest font-bold mb-1">Post</p>
            <p class="text-gray-800 font-medium">{{ $post->description }}</p>
        </div>

        <p class="text-center text-xs text-gray-400 uppercase tracking-widest font-bold mt-8">
            University of Mindanao • Data Systems
        </p>
    </div>
</div>
@endsection