@extends('layouts.admin')

@section('content')
<h2 class="text-2xl font-bold mb-6">{{ isset($project) ? 'Edit' : 'Tambah' }} Project</h2>

<form method="POST" action="{{ isset($project) ? route('admin.projects.update', $project) : route('admin.projects.store') }}" class="max-w-3xl">
    @csrf
    @if(isset($project)) @method('PUT') @endif

    <div class="mb-5">
        <label class="block text-sm font-medium mb-2">Nama Project</label>
        <input type="text" name="name" value="{{ old('name', $project->name ?? '') }}" required class="w-full px-4 py-2 border rounded-lg dark:bg-gray-700">
    </div>
    <div class="mb-5">
        <label class="block text-sm font-medium mb-2">Deskripsi</label>
        <textarea name="description" rows="4" required class="w-full px-4 py-2 border rounded-lg dark:bg-gray-700">{{ old('description', $project->description ?? '') }}</textarea>
    </div>
    <div class="mb-5">
        <label class="block text-sm font-medium mb-2">Fitur Utama</label>
        <textarea name="features" rows="3" required class="w-full px-4 py-2 border rounded-lg dark:bg-gray-700">{{ old('features', $project->features ?? '') }}</textarea>
    </div>
    <div class="mb-5">
        <label class="block text-sm font-medium mb-2">Tech Stack</label>
        <input type="text" name="tech_stack" value="{{ old('tech_stack', $project->tech_stack ?? '') }}" required class="w-full px-4 py-2 border rounded-lg dark:bg-gray-700">
    </div>

    <div class="flex gap-4">
        <button type="submit" class="bg-light-cyan hover:bg-cyan-600 text-white px-6 py-2 rounded-lg">Simpan Project</button>
        <a href="{{ route('admin.projects.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-6 py-2 rounded-lg">Kembali</a>
    </div>
</form>
@endsection