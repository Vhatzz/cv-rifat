@extends('layouts.admin')

@section('content')
<div class="flex justify-between items-center mb-8 action-buttons">
    <div>
        <h1 class="text-3xl font-bold text-gray-800 dark:text-white">Projects Management</h1>
        <p class="text-gray-600 dark:text-gray-400 mt-2">Manage your portfolio projects</p>
    </div>
    <a href="{{ route('admin.projects.create') }}" class="bg-cyan-500 hover:bg-cyan-600 text-white px-6 py-3 rounded-lg transition duration-200 flex items-center shadow-md">
        <i class="bi bi-plus-circle mr-2"></i> Add New Project
    </a>
</div>

@if($projects->count() > 0)
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    @foreach($projects as $project)
    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 overflow-hidden hover:shadow-md transition duration-200">
        <div class="h-48 bg-gray-200 dark:bg-gray-700 relative">
            @if($project->image)
                <img src="{{ asset('storage/'.$project->image) }}" alt="{{ $project->name }}" class="w-full h-full object-cover">
            @else
                <div class="w-full h-full flex items-center justify-center">
                    <i class="bi bi-image text-4xl text-gray-400"></i>
                </div>
            @endif
        </div>
        
        <div class="p-6">
            <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-2">{{ $project->name }}</h3>
            <p class="text-gray-600 dark:text-gray-400 text-sm mb-4 line-clamp-2">{{ \Illuminate\Support\Str::limit($project->description, 100) }}</p>
            
            <div class="flex flex-wrap gap-2 mb-4">
                @foreach(explode(',', $project->tech_stack) as $tech)
                    <span class="inline-block bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300 text-xs px-2 py-1 rounded">
                        {{ trim($tech) }}
                    </span>
                @endforeach
            </div>

            <div class="flex justify-between items-center mb-3">
                <div class="flex space-x-3">
                    <a href="{{ route('admin.projects.edit', $project) }}" 
                       class="text-blue-600 hover:text-blue-900 dark:text-blue-400 dark:hover:text-blue-300 transition duration-200 flex items-center text-sm px-3 py-1 rounded border border-blue-200 dark:border-blue-800 hover:bg-blue-50 dark:hover:bg-blue-900/30">
                        <i class="bi bi-pencil-square mr-2"></i> Edit
                    </a>
                    <form method="POST" action="{{ route('admin.projects.destroy', $project) }}" class="inline">
                        @csrf 
                        @method('DELETE')
                        <button type="submit" 
                                onclick="return confirm('Are you sure you want to delete this project?')"
                                class="text-red-600 hover:text-red-900 dark:text-red-400 dark:hover:text-red-300 transition duration-200 flex items-center text-sm px-3 py-1 rounded border border-red-200 dark:border-red-800 hover:bg-red-50 dark:hover:bg-red-900/30">
                            <i class="bi bi-trash mr-2"></i> Delete
                        </button>
                    </form>
                </div>
                
                @if($project->github_link)
                <a href="{{ $project->github_link }}" target="_blank" class="text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-gray-300 bg-gray-100 dark:bg-gray-700 p-2 rounded-lg">
                    <i class="bi bi-github text-lg"></i>
                </a>
                @endif
            </div>

            <!-- Image Upload Form -->
            <form method="POST" action="{{ route('admin.projects.image', $project->id) }}" enctype="multipart/form-data" class="mt-4 pt-4 border-t border-gray-200 dark:border-gray-700">
                @csrf
                <label class="block text-xs text-gray-600 dark:text-gray-400 mb-2">Update Project Image:</label>
                <div class="flex space-x-2">
                    <input type="file" name="image" accept="image/*" class="flex-1 text-xs border border-gray-300 dark:border-gray-600 rounded px-2 py-1">
                    <button type="submit" class="bg-green-500 hover:bg-green-600 text-white px-3 py-1 rounded text-xs transition duration-200">
                        Upload
                    </button>
                </div>
            </form>
        </div>
    </div>
    @endforeach
</div>
@else
<div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-12 text-center">
    <div class="w-20 h-20 rounded-full bg-cyan-100 dark:bg-cyan-900/30 flex items-center justify-center mx-auto mb-6">
        <i class="bi bi-folder text-3xl text-cyan-500"></i>
    </div>
    <h3 class="text-2xl font-bold text-gray-800 dark:text-white mb-2">No projects yet</h3>
    <p class="text-gray-600 dark:text-gray-400 mb-6 max-w-md mx-auto">Showcase your work by adding projects to your portfolio. Include details about the technologies used and project features.</p>
    <a href="{{ route('admin.projects.create') }}" class="inline-flex items-center bg-cyan-500 hover:bg-cyan-600 text-white px-6 py-3 rounded-lg transition duration-200 shadow-md">
        <i class="bi bi-plus-circle mr-2"></i>Add Your First Project
    </a>
</div>
@endif

<!-- Project Statistics -->
<div class="mt-8 grid grid-cols-1 md:grid-cols-4 gap-6">
    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6 text-center">
        <div class="w-12 h-12 rounded-lg bg-blue-100 dark:bg-blue-900/30 flex items-center justify-center mx-auto mb-4">
            <i class="bi bi-folder text-blue-500 text-xl"></i>
        </div>
        <h4 class="text-lg font-semibold text-gray-800 dark:text-white">{{ $projects->count() }}</h4>
        <p class="text-gray-600 dark:text-gray-400">Total Projects</p>
    </div>
    
    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6 text-center">
        <div class="w-12 h-12 rounded-lg bg-green-100 dark:bg-green-900/30 flex items-center justify-center mx-auto mb-4">
            <i class="bi bi-github text-green-500 text-xl"></i>
        </div>
        <h4 class="text-lg font-semibold text-gray-800 dark:text-white">{{ $projects->where('github_link', '!=', null)->count() }}</h4>
        <p class="text-gray-600 dark:text-gray-400">With GitHub Links</p>
    </div>
    
    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6 text-center">
        <div class="w-12 h-12 rounded-lg bg-purple-100 dark:bg-purple-900/30 flex items-center justify-center mx-auto mb-4">
            <i class="bi bi-image text-purple-500 text-xl"></i>
        </div>
        <h4 class="text-lg font-semibold text-gray-800 dark:text-white">{{ $projects->where('image', '!=', null)->count() }}</h4>
        <p class="text-gray-600 dark:text-gray-400">With Images</p>
    </div>
    
    @php
        $avgNameLength = $projects->count()
            ? round($projects->avg(function($project) {
                return mb_strlen($project->name);
            }))
            : 0;
    @endphp
    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6 text-center">
        <div class="w-12 h-12 rounded-lg bg-yellow-100 dark:bg-yellow-900/30 flex items-center justify-center mx-auto mb-4">
            <i class="bi bi-star text-yellow-500 text-xl"></i>
        </div>
        <h4 class="text-lg font-semibold text-gray-800 dark:text-white">{{ $avgNameLength }}</h4>
        <p class="text-gray-600 dark:text-gray-400">Avg Name Length</p>
    </div>
</div>
@endsection
