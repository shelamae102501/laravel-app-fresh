@extends('layout.app')
@section('title', 'Users List')
@section('content')
<div class="max-w-7xl mx-auto">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-gray-900">👥 Users List</h1>
        <a href="/user_registration" class="bg-green-600 text-white px-5 py-2.5 rounded-lg font-semibold hover:bg-green-700 transition">+ Add New User</a>
    </div>

    <div class="bg-white shadow-md rounded-xl overflow-hidden">
        <table class="w-full text-sm">
            <thead class="bg-gray-100 text-gray-600 uppercase text-xs">
                <tr>
                    <th class="px-6 py-4 text-left">Name</th>
                    <th class="px-6 py-4 text-left">Email</th>
                    <th class="px-6 py-4 text-left">Age</th>
                    <th class="px-6 py-4 text-left">Contact</th>
                    <th class="px-6 py-4 text-left">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse($users as $user)
                <tr class="hover:bg-gray-50 transition">
                    <td class="px-6 py-4">
                        <div class="font-medium text-gray-900">{{ $user->first_name }} {{ $user->last_name }}
                            @if($user->nickname)
                                <span class="text-gray-400 text-xs">({{ $user->nickname }})</span>
                            @endif
                        </div>
                        <div class="text-gray-500 text-xs">{{ $user->name }}</div>
                    </td>
                    <td class="px-6 py-4 text-gray-700">{{ $user->email }}</td>
                    <td class="px-6 py-4 text-gray-700">{{ $user->age }}</td>
                    <td class="px-6 py-4 text-gray-700">{{ $user->contact_number ?? 'N/A' }}</td>
                    <td class="px-6 py-4 flex gap-2">
                        <a href="/users/{{ $user->id }}/edit" class="bg-yellow-50 text-yellow-600 px-3 py-1.5 rounded-lg text-xs font-semibold hover:bg-yellow-100 transition">Edit</a>
                        <form method="POST" action="/users/{{ $user->id }}" class="inline" onsubmit="return confirm('Are you sure?')">
                            @csrf
                            @method('DELETE')
                            <button class="bg-red-50 text-red-600 px-3 py-1.5 rounded-lg text-xs font-semibold hover:bg-red-100 transition">Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="px-6 py-12 text-center text-gray-400">No users found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection