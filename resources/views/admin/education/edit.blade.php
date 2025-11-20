@extends('layouts.admin')

@section('content')
<div class="mb-6">
    <h1 class="text-3xl font-bold text-gray-800 dark:text-white">Edit Pendidikan</h1>
    <p class="text-gray-600 dark:text-gray-400">Edit riwayat pendidikan</p>
</div>

<div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6">
    <form method="POST" action="{{ route('admin.education.update', $education) }}">
        @csrf
        @method('PUT')
        
        <div class="grid grid-cols-1 gap-6">
            <div>
                <label for="institution" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                    Nama Institusi *
                </label>
                <input type="text" 
                       name="institution" 
                       id="institution"
                       value="{{ old('institution', $education->institution) }}"
                       required
                       class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-cyan-500 focus:border-transparent dark:bg-gray-700 dark:text-white transition">
                @error('institution')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="program" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                    Program Studi
                </label>
                <input type="text" 
                       name="program" 
                       id="program"
                       value="{{ old('program', $education->program) }}"
                       class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-cyan-500 focus:border-transparent dark:bg-gray-700 dark:text-white transition">
                @error('program')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="year" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                    Tahun *
                </label>
                <input type="text" 
                       name="year" 
                       id="year"
                       value="{{ old('year', $education->year) }}"
                       required
                       class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-cyan-500 focus:border-transparent dark:bg-gray-700 dark:text-white transition">
                @error('year')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="flex justify-end space-x-4 mt-8">
            <a href="{{ route('admin.education.index') }}" 
               class="px-6 py-3 border border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-700 transition duration-200">
                Batal
            </a>
            <button type="submit" 
                    class="px-6 py-3 bg-cyan-500 hover:bg-cyan-600 text-white rounded-lg transition duration-200">
                <i class="bi bi-check-lg mr-2"></i>Update Pendidikan
            </button>
        </div>
    </form>
</div>
@endsection