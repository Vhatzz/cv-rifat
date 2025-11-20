@extends('layouts.admin')

@section('content')
<div class="mb-6">
    <h1 class="text-3xl font-bold text-gray-800 dark:text-white">Add New Skill</h1>
    <p class="text-gray-600 dark:text-gray-400 mt-2">Add a new skill to showcase your expertise</p>
</div>

<div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
    <form method="POST" action="{{ route('admin.skills.store') }}">
        @csrf
        
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                    Skill Name *
                </label>
                <input type="text" 
                       name="name" 
                       id="name"
                       value="{{ old('name') }}"
                       required
                       class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-cyan-500 focus:border-transparent dark:bg-gray-700 dark:text-white transition"
                       placeholder="e.g., Laravel, JavaScript, Photoshop">
                @error('name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="type" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                    Skill Type *
                </label>
                <select name="type" 
                        id="type"
                        required
                        class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-cyan-500 focus:border-transparent dark:bg-gray-700 dark:text-white transition">
                    <option value="">Select Type</option>
                    <option value="hard" {{ old('type') == 'hard' ? 'selected' : '' }}>Hard Skill</option>
                    <option value="soft" {{ old('type') == 'soft' ? 'selected' : '' }}>Soft Skill</option>
                    <option value="tool" {{ old('type') == 'tool' ? 'selected' : '' }}>Tool</option>
                </select>
                @error('type')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="level" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                    Skill Level
                </label>
                <select name="level" 
                        id="level"
                        class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-cyan-500 focus:border-transparent dark:bg-gray-700 dark:text-white transition">
                    <option value="">Select Level (Optional)</option>
                    <option value="Beginner" {{ old('level') == 'Beginner' ? 'selected' : '' }}>Beginner</option>
                    <option value="Intermediate" {{ old('level') == 'Intermediate' ? 'selected' : '' }}>Intermediate</option>
                    <option value="Advanced" {{ old('level') == 'Advanced' ? 'selected' : '' }}>Advanced</option>
                </select>
                @error('level')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="logo_url" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                    Logo URL
                </label>
                <input type="url" 
                       name="logo_url" 
                       id="logo_url"
                       value="{{ old('logo_url') }}"
                       class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-cyan-500 focus:border-transparent dark:bg-gray-700 dark:text-white transition"
                       placeholder="https://example.com/logo.png">
                @error('logo_url')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
                <p class="text-xs text-gray-500 mt-2">For tools, you can add a logo URL from services like devicon</p>
            </div>
        </div>

        <div class="flex justify-end space-x-4 mt-8">
            <a href="{{ route('admin.skills.index') }}" 
               class="px-6 py-3 border border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-700 transition duration-200">
                Cancel
            </a>
            <button type="submit" 
                    class="px-6 py-3 bg-cyan-500 hover:bg-cyan-600 text-white rounded-lg transition duration-200 flex items-center">
                <i class="bi bi-check-lg mr-2"></i>Create Skill
            </button>
        </div>
    </form>
</div>

<!-- Quick Tips -->
<div class="mt-8 bg-blue-50 dark:bg-blue-900/20 border border-blue-200 dark:border-blue-800 rounded-xl p-6">
    <h3 class="text-lg font-semibold text-blue-800 dark:text-blue-300 mb-3 flex items-center">
        <i class="bi bi-lightbulb mr-2"></i> Quick Tips
    </h3>
    <ul class="text-blue-700 dark:text-blue-400 space-y-2 text-sm">
        <li class="flex items-start">
            <i class="bi bi-dot mr-2 mt-1"></i>
            <span><strong>Hard Skills:</strong> Technical abilities like programming languages, frameworks</span>
        </li>
        <li class="flex items-start">
            <i class="bi bi-dot mr-2 mt-1"></i>
            <span><strong>Soft Skills:</strong> Interpersonal skills like communication, teamwork</span>
        </li>
        <li class="flex items-start">
            <i class="bi bi-dot mr-2 mt-1"></i>
            <span><strong>Tools:</strong> Software and applications you're proficient with</span>
        </li>
        <li class="flex items-start">
            <i class="bi bi-dot mr-2 mt-1"></i>
            <span>For tool logos, you can use <a href="https://devicon.dev/" target="_blank" class="underline">Devicon</a> or similar services</span>
        </li>
    </ul>
</div>
@endsection