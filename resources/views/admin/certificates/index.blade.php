@extends('layouts.admin')

@section('content')
<div class="flex justify-between items-center mb-8 action-buttons">
    <div>
        <h1 class="text-3xl font-bold text-gray-800 dark:text-white">Certificates Management</h1>
        <p class="text-gray-600 dark:text-gray-400 mt-2">Manage your certificates and achievements</p>
    </div>
    <a href="{{ route('admin.certificates.create') }}" class="bg-cyan-500 hover:bg-cyan-600 text-white px-6 py-3 rounded-lg transition duration-200 flex items-center shadow-md">
        <i class="bi bi-plus-circle mr-2"></i> Add Certificate
    </a>
</div>

@if($certificates->count() > 0)
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    @foreach($certificates as $cert)
    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 overflow-hidden hover:shadow-md transition duration-200">
        <div class="h-48 bg-gradient-to-br from-cyan-500 to-blue-600 dark:from-cyan-600 dark:to-blue-700 relative flex items-center justify-center">
            @if($cert->image)
                <img src="{{ asset('storage/'.$cert->image) }}" alt="{{ $cert->name }}" class="w-full h-full object-cover">
            @else
                <div class="text-center text-white">
                    <i class="bi bi-award text-5xl mb-3"></i>
                    <p class="text-lg font-semibold">Certificate</p>
                </div>
            @endif
        </div>
        
        <div class="p-6">
            <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-3">{{ $cert->name }}</h3>
            
            <div class="flex justify-between items-center mt-4">
                <div class="flex space-x-3">
                    <a href="{{ route('admin.certificates.edit', $cert) }}" 
                       class="text-blue-600 hover:text-blue-900 dark:text-blue-400 dark:hover:text-blue-300 transition duration-200 flex items-center text-sm">
                        <i class="bi bi-pencil-square mr-1"></i> Edit
                    </a>
                    <form method="POST" action="{{ route('admin.certificates.destroy', $cert) }}" class="inline">
                        @csrf @method('DELETE')
                        <button type="submit" 
                                onclick="return confirm('Are you sure you want to delete this certificate?')"
                                class="text-red-600 hover:text-red-900 dark:text-red-400 dark:hover:text-red-300 transition duration-200 flex items-center text-sm">
                            <i class="bi bi-trash mr-1"></i> Delete
                        </button>
                    </form>
                </div>
            </div>

            <!-- Image Upload Form -->
            <form method="POST" action="{{ route('admin.certificates.image', $cert->id) }}" enctype="multipart/form-data" class="mt-4 pt-4 border-t border-gray-200 dark:border-gray-700">
                @csrf
                <label class="block text-xs text-gray-600 dark:text-gray-400 mb-2">Certificate Image:</label>
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
        <i class="bi bi-award text-3xl text-cyan-500"></i>
    </div>
    <h3 class="text-2xl font-bold text-gray-800 dark:text-white mb-2">No certificates added yet</h3>
    <p class="text-gray-600 dark:text-gray-400 mb-6 max-w-md mx-auto">Showcase your achievements by adding certificates to your portfolio.</p>
    <a href="{{ route('admin.certificates.create') }}" class="inline-flex items-center bg-cyan-500 hover:bg-cyan-600 text-white px-6 py-3 rounded-lg transition duration-200 shadow-md">
        <i class="bi bi-plus-circle mr-2"></i>Add Your First Certificate
    </a>
</div>
@endif

<!-- Quick Actions -->
<div class="mt-8 bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
    <h3 class="text-lg font-semibold text-gray-800 dark:text-white mb-4 flex items-center">
        <i class="bi bi-lightbulb text-cyan-500 mr-2"></i> Certificate Tips
    </h3>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm text-gray-600 dark:text-gray-400">
        <div class="flex items-start">
            <i class="bi bi-check-circle text-green-500 mr-2 mt-0.5"></i>
            <span>Upload high-quality images of your certificates for better presentation</span>
        </div>
        <div class="flex items-start">
            <i class="bi bi-check-circle text-green-500 mr-2 mt-0.5"></i>
            <span>Include both professional certifications and academic achievements</span>
        </div>
        <div class="flex items-start">
            <i class="bi bi-check-circle text-green-500 mr-2 mt-0.5"></i>
            <span>Keep certificate names clear and descriptive</span>
        </div>
        <div class="flex items-start">
            <i class="bi bi-check-circle text-green-500 mr-2 mt-0.5"></i>
            <span>Regularly update with new certifications and accomplishments</span>
        </div>
    </div>
</div>
@endsection