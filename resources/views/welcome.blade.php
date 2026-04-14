@extends('layout.app')
@section('title', 'Personal Information')
@section('content')
<div class="max-w-2xl mx-auto">
    <div class="bg-white shadow-md rounded-xl p-8">
        <h2 class="text-2xl font-bold text-gray-900 mb-1">Personal Information</h2>
        <p class="text-sm text-gray-500 mb-8">Use a permanent address where you can receive mail.</p>

        <div class="grid grid-cols-1 gap-x-6 gap-y-6 sm:grid-cols-6">
            <div class="sm:col-span-3">
                <label for="first-name" class="block text-sm font-medium text-gray-700 mb-1">First name</label>
                <input id="first-name" type="text" name="first-name" autocomplete="given-name"
                    class="block w-full rounded-lg border border-gray-300 px-3 py-2.5 text-sm text-gray-900 focus:ring-2 focus:ring-blue-500 focus:border-blue-500" />
            </div>

            <div class="sm:col-span-3">
                <label for="last-name" class="block text-sm font-medium text-gray-700 mb-1">Last name</label>
                <input id="last-name" type="text" name="last-name" autocomplete="family-name"
                    class="block w-full rounded-lg border border-gray-300 px-3 py-2.5 text-sm text-gray-900 focus:ring-2 focus:ring-blue-500 focus:border-blue-500" />
            </div>

            <div class="sm:col-span-4">
                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email address</label>
                <input id="email" type="email" name="email" autocomplete="email"
                    class="block w-full rounded-lg border border-gray-300 px-3 py-2.5 text-sm text-gray-900 focus:ring-2 focus:ring-blue-500 focus:border-blue-500" />
            </div>
        </div>

        <div class="mt-8 flex justify-end">
            <button type="submit" class="bg-green-600 text-white px-6 py-2.5 rounded-lg text-sm font-semibold hover:bg-green-700 transition">
                Save
            </button>
        </div>
    </div>
</div>
@endsection