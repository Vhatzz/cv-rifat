@extends('layouts.admin')

@section('content')
<h2 class="text-2xl font-bold mb-6">{{ isset($skill) ? 'Edit' : 'Tambah' }} Skill</h2>

<form method="POST" action="{{ isset($skill) ? route('admin.skills.update', $skill) : route('admin.skills.store') }}" class="max-w-2xl">
    @csrf
    @if(isset($skill)) @method('PUT') @endif

    <div class="mb-5">
        <label class="block text-sm font-medium mb-2">Nama Skill</label>
        <input type="text" name="name" value="{{ old('name', $skill->name ?? '') }}" required class="w-full px-4 py-2 border rounded-lg dark:bg-gray-700">
    </div>

    <div class="mb-5">
        <label class="block text-sm font-medium mb-2">Tipe</label>
        <select name="type" required class="w-full px-4 py-2 border rounded-lg dark:bg-gray-700">
            <option value="hard" {{ old('type', $skill->type ?? '') == 'hard' ? 'selected' : '' }}>Hard Skill</option>
            <option value="soft" {{ old('type', $skill->type ?? '') == 'soft' ? 'selected' : '' }}>Soft Skill</option>
            <option value="tool" {{ old('type', $skill->type ?? '') == 'tool' ? 'selected' : '' }}>Tool</option>
        </select>
    </div>

    <div class="mb-5">
        <label class="block text-sm font-medium mb-2">Level (opsional untuk soft skill)</label>
        <select name="level" class="w-full px-4 py-2 border rounded-lg dark:bg-gray-700">
            <option value="">- Tidak ada -</option>
            <option value="Beginner" {{ old('level', $skill->level ?? '') == 'Beginner' ? 'selected' : '' }}>Beginner</option>
            <option value="Intermediate" {{ old('level', $skill->level ?? '') == 'Intermediate' ? 'selected' : '' }}>Intermediate</option>
            <option value="Advanced" {{ old('level', $skill->level ?? '') == 'Advanced' ? 'selected' : '' }}>Advanced</option>
        </select>
    </div>

    <div class="mb-5">
        <label class="block text-sm font-medium mb-2">Logo URL (untuk tool)</label>
        <input type="url" name="logo_url" value="{{ old('logo_url', $skill->logo_url ?? '') }}" placeholder="https://..." class="w-full px-4 py-2 border rounded-lg dark:bg-gray-700">
    </div>

    <div class="flex gap-4">
        <button type="submit" class="bg-light-cyan hover:bg-cyan-600 text-white px-6 py-2 rounded-lg">Simpan</button>
        <a href="{{ route('admin.skills.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-6 py-2 rounded-lg">Kembali</a>
    </div>
</form>
@endsection