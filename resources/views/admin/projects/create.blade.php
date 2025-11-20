@extends('layouts.admin')

@section('content')
<div class="mb-6">
    <h1 class="text-3xl font-bold text-gray-800 dark:text-white">Add New Project</h1>
    <p class="text-gray-600 dark:text-gray-400 mt-2">Add a new project to your portfolio</p>
</div>

<div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
    <form method="POST" action="{{ route('admin.projects.store') }}">
        @csrf
        
        <div class="space-y-6">
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                    Project Name *
                </label>
                <input type="text" 
                       name="name" 
                       id="name"
                       value="{{ old('name') }}"
                       required
                       class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-cyan-500 focus:border-transparent dark:bg-gray-700 dark:text-white transition"
                       placeholder="e.g., E-Commerce Website, Mobile App">
                @error('name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                    Project Description *
                </label>
                <textarea name="description" 
                          id="description"
                          rows="4"
                          required
                          class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-cyan-500 focus:border-transparent dark:bg-gray-700 dark:text-white transition"
                          placeholder="Describe your project, its purpose, and key achievements">{{ old('description') }}</textarea>
                @error('description')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="features" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                    Key Features *
                </label>
                <textarea name="features" 
                          id="features"
                          rows="3"
                          required
                          class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-cyan-500 focus:border-transparent dark:bg-gray-700 dark:text-white transition"
                          placeholder="List the main features of your project (comma separated)">{{ old('features') }}</textarea>
                @error('features')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="tech_stack" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                    Technology Stack *
                </label>
                <input type="text" 
                       name="tech_stack" 
                       id="tech_stack"
                       value="{{ old('tech_stack') }}"
                       required
                       class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-cyan-500 focus:border-transparent dark:bg-gray-700 dark:text-white transition"
                       placeholder="e.g., Laravel, React, MySQL, Tailwind CSS">
                @error('tech_stack')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="github_link" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                    GitHub Link (Optional)
                </label>
                <input type="url" 
                       name="github_link" 
                       id="github_link"
                       value="{{ old('github_link') }}"
                       class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-cyan-500 focus:border-transparent dark:bg-gray-700 dark:text-white transition"
                       placeholder="https://github.com/username/project">
                @error('github_link')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="flex justify-end space-x-4 mt-8">
            <a href="{{ route('admin.projects.index') }}" 
               class="px-6 py-3 border border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-700 transition duration-200">
                Cancel
            </a>
            <button type="submit" 
                    class="px-6 py-3 bg-cyan-500 hover:bg-cyan-600 text-white rounded-lg transition duration-200 flex items-center">
                <i class="bi bi-check-lg mr-2"></i>Create Project
            </button>
        </div>
    </form>
</div>

<!-- Image Upload Note -->
<div class="mt-6 bg-yellow-50 dark:bg-yellow-900/20 border border-yellow-200 dark:border-yellow-800 rounded-xl p-4">
    <div class="flex items-start">
        <i class="bi bi-info-circle text-yellow-500 mt-0.5 mr-3"></i>
        <div>
            <h4 class="text-sm font-medium text-yellow-800 dark:text-yellow-300">Project Images</h4>
            <p class="text-sm text-yellow-700 dark:text-yellow-400 mt-1">
                You can upload project images after creating the project. Use the "Upload" button on the project card to add or update images.
            </p>
        </div>
    </div>
</div>
@endsection