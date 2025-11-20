@extends('layouts.admin')

@section('content')
<div class="flex justify-between items-center mb-8 action-buttons">
    <div>
        <h1 class="text-3xl font-bold text-gray-800 dark:text-white">Education Management</h1>
        <p class="text-gray-600 dark:text-gray-400 mt-2">Manage your educational background</p>
    </div>
    <a href="{{ route('admin.education.create') }}" class="bg-cyan-500 hover:bg-cyan-600 text-white px-6 py-3 rounded-lg transition duration-200 flex items-center shadow-md">
        <i class="bi bi-plus-circle mr-2"></i> Add Education
    </a>
</div>

@if($educations->count() > 0)
<div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full table-auto">
            <thead class="bg-gray-50 dark:bg-gray-700">
                <tr>
                    <th class="px-6 py-4 text-left text-sm font-semibold text-gray-600 dark:text-gray-300">Institution</th>
                    <th class="px-6 py-4 text-left text-sm font-semibold text-gray-600 dark:text-gray-300">Program</th>
                    <th class="px-6 py-4 text-left text-sm font-semibold text-gray-600 dark:text-gray-300">Year</th>
                    <th class="px-6 py-4 text-center text-sm font-semibold text-gray-600 dark:text-gray-300">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                @foreach($educations as $edu)
                <tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                    <td class="px-6 py-4">
                        <div class="flex items-center">
                            <div class="w-10 h-10 rounded-lg bg-cyan-100 dark:bg-cyan-900/30 flex items-center justify-center mr-4">
                                <i class="bi bi-mortarboard text-cyan-500"></i>
                            </div>
                            <div>
                                <div class="text-sm font-medium text-gray-900 dark:text-white">{{ $edu->institution }}</div>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="text-sm text-gray-600 dark:text-gray-400">
                            {{ $edu->program ?? '-' }}
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200">
                            {{ $edu->year }}
                        </span>
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex justify-center space-x-3">
                            <a href="{{ route('admin.education.edit', $edu) }}" 
                               class="text-blue-600 hover:text-blue-900 dark:text-blue-400 dark:hover:text-blue-300 transition duration-200 flex items-center px-3 py-1 rounded border border-blue-200 dark:border-blue-800 hover:bg-blue-50 dark:hover:bg-blue-900/30">
                                <i class="bi bi-pencil-square mr-2"></i> Edit
                            </a>
                            <form method="POST" action="{{ route('admin.education.destroy', $edu) }}" class="inline">
                                @csrf 
                                @method('DELETE')
                                <button type="submit" 
                                        onclick="return confirm('Are you sure you want to delete this education?')"
                                        class="text-red-600 hover:text-red-900 dark:text-red-400 dark:hover:text-red-300 transition duration-200 flex items-center px-3 py-1 rounded border border-red-200 dark:border-red-800 hover:bg-red-50 dark:hover:bg-red-900/30">
                                    <i class="bi bi-trash mr-2"></i> Delete
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@else
<div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-12 text-center">
    <div class="w-20 h-20 rounded-full bg-cyan-100 dark:bg-cyan-900/30 flex items-center justify-center mx-auto mb-6">
        <i class="bi bi-mortarboard text-3xl text-cyan-500"></i>
    </div>
    <h3 class="text-2xl font-bold text-gray-800 dark:text-white mb-2">No education added yet</h3>
    <p class="text-gray-600 dark:text-gray-400 mb-6 max-w-md mx-auto">Add your educational background to showcase your academic journey and qualifications.</p>
    <a href="{{ route('admin.education.create') }}" class="inline-flex items-center bg-cyan-500 hover:bg-cyan-600 text-white px-6 py-3 rounded-lg transition duration-200 shadow-md">
        <i class="bi bi-plus-circle mr-2"></i>Add Your First Education
    </a>
</div>
@endif

<!-- Quick Stats -->
@php
    $currentEducationCount = $educations->filter(function($edu) {
        if (!$edu->year) return false;
        $year = mb_strtolower($edu->year);
        return str_contains($year, 'sekarang') || str_contains($year, 'present');
    })->count();
@endphp

<div class="mt-8 grid grid-cols-1 md:grid-cols-3 gap-6">
    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6 text-center">
        <div class="w-12 h-12 rounded-lg bg-green-100 dark:bg-green-900/30 flex items-center justify-center mx-auto mb-4">
            <i class="bi bi-building text-green-500 text-xl"></i>
        </div>
        <h4 class="text-lg font-semibold text-gray-800 dark:text-white">{{ $educations->count() }}</h4>
        <p class="text-gray-600 dark:text-gray-400">Total Institutions</p>
    </div>
    
    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6 text-center">
        <div class="w-12 h-12 rounded-lg bg-blue-100 dark:bg-blue-900/30 flex items-center justify-center mx-auto mb-4">
            <i class="bi bi-book text-blue-500 text-xl"></i>
        </div>
        <h4 class="text-lg font-semibold text-gray-800 dark:text-white">{{ $educations->where('program', '!=', null)->count() }}</h4>
        <p class="text-gray-600 dark:text-gray-400">With Programs</p>
    </div>
    
    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6 text-center">
        <div class="w-12 h-12 rounded-lg bg-purple-100 dark:bg-purple-900/30 flex items-center justify-center mx-auto mb-4">
            <i class="bi bi-clock-history text-purple-500 text-xl"></i>
        </div>
        <h4 class="text-lg font-semibold text-gray-800 dark:text-white">{{ $currentEducationCount }}</h4>
        <p class="text-gray-600 dark:text-gray-400">Current Education</p>
    </div>
</div>
@endsection
