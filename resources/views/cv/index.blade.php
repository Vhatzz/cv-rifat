@extends('layouts.app')

@section('content')
@php
    use Illuminate\Support\Facades\Storage;
    $profile = $profile ?? (object)['name' => 'Rifat Pratama', 'status' => 'Mahasiswa Teknik Informatika', 'domicile' => 'Sukabumi', 'about' => 'Loading...'];
@endphp

<!-- Hero -->
<section class="py-16 text-center bg-gradient-to-b from-cyan-50 to-white dark:from-gray-900 dark:to-black">
    <div class="container mx-auto px-4">
        @if($profile->photo && Storage::disk('public')->exists($profile->photo))
            <img src="{{ asset('storage/' . $profile->photo) }}" 
                 alt="Foto Profil" 
                 class="w-32 h-32 rounded-full mx-auto border-8 border-cyan-500 shadow-2xl object-cover">
        @else
            <div class="w-32 h-32 rounded-full mx-auto border-8 border-cyan-500 shadow-2xl bg-gray-200 dark:bg-gray-700 flex items-center justify-center">
                <i class="bi bi-person text-4xl text-gray-400"></i>
            </div>
        @endif
        <h1 class="mt-6 text-4xl font-bold text-cyan-600 dark:text-yellow-400">{{ $profile->name }}</h1>
        <p class="text-xl text-gray-700 dark:text-gray-300">{{ $profile->status }}</p>
        <p class="text-lg text-gray-600 dark:text-gray-400">{{ $profile->domicile }}</p>
    </div>
</section>

<!-- About -->
<section class="py-12 bg-white dark:bg-gray-800">
    <div class="container mx-auto px-4 text-center max-w-3xl">
        <h2 class="text-3xl font-bold text-cyan-600 dark:text-yellow-400 mb-6">Tentang Saya</h2>
        <p class="text-lg leading-relaxed text-gray-700 dark:text-gray-300">
            {{ $profile->about ?? 'Mahasiswa Teknik Informatika yang antusias dengan pengembangan web dan mobile.' }}
        </p>
    </div>
</section>

<!-- Hard Skills -->
<section class="py-12">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-center text-cyan-600 dark:text-yellow-400 mb-8">Hard Skills</h2>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
            @foreach($hardSkills as $skill)
            <div class="bg-gray-50 dark:bg-gray-700 p-6 rounded-xl text-center shadow hover:shadow-xl transition">
                <div class="text-4xl mb-4">
                    @if($skill->logo_url ?? false)
                        <img src="{{ $skill->logo_url }}" alt="{{ $skill->name }}" class="w-16 h-16 mx-auto">
                    @else
                        <i class="bi bi-code-slash"></i>
                    @endif
                </div>
                <h3 class="font-bold">{{ $skill->name }}</h3>
                <span class="text-sm text-gray-600 dark:text-gray-400">{{ $skill->level }}</span>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Soft Skills -->
<section class="py-12 bg-gray-50 dark:bg-gray-900">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-center text-cyan-600 dark:text-yellow-400 mb-8">Soft Skills</h2>
        <div class="grid grid-cols-2 md:grid-cols-5 gap-6">
            @foreach($softSkills as $skill)
            <div class="bg-white dark:bg-gray-800 p-6 rounded-xl text-center shadow hover:shadow-xl transition">
                <div class="text-5xl mb-4">
                    @switch($skill->name)
                        @case('Communication') 💬 @break
                        @case('Teamwork') 🤝 @break
                        @case('Problem Solving') 🧠 @break
                        @case('Adaptability') 🌟 @break
                        @case('Time Management') ⏰ @break
                        @default ⭐
                    @endswitch
                </div>
                <h3 class="font-bold">{{ $skill->name }}</h3>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Tools Skills — Horizontal Scroll (BISA DIGESER) -->
<section class="py-12">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-center text-cyan-600 dark:text-yellow-400 mb-8">Tools Skills</h2>
        <div class="overflow-x-auto pb-4">
            <div class="flex gap-6 min-w-max">
                @foreach($tools as $tool)
                <div class="bg-white dark:bg-gray-800 p-6 rounded-xl shadow hover:shadow-2xl transition-all hover:scale-110 w-40 text-center flex-shrink-0">
                    <img src="{{ $tool->logo_url ?? 'https://via.placeholder.com/80' }}" alt="{{ $tool->name }}" class="w-20 h-20 mx-auto mb-3 object-contain">
                    <h3 class="font-bold text-sm">{{ $tool->name }}</h3>
                    <p class="text-xs text-gray-600 dark:text-gray-400">{{ $tool->level }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

<!-- Projects -->
<section class="py-12 bg-gray-50 dark:bg-gray-900">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-center text-cyan-600 dark:text-yellow-400 mb-8">Projects</h2>
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($projects as $project)
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg overflow-hidden hover:shadow-2xl transition">
                @if($project->image && Storage::disk('public')->exists($project->image))
                    <img src="{{ asset('storage/' . $project->image) }}" 
                         alt="{{ $project->name }}" class="w-full h-48 object-cover">
                @else
                    <div class="w-full h-48 bg-gray-200 dark:bg-gray-700 flex items-center justify-center">
                        <i class="bi bi-image text-4xl text-gray-400"></i>
                    </div>
                @endif
                <div class="p-6">
                    <h3 class="text-xl font-bold mb-2">{{ $project->name }}</h3>
                    <p class="text-gray-600 dark:text-gray-400 text-sm mb-4">{{ $project->description }}</p>
                    <div class="flex flex-wrap gap-2 mb-4">
                        <span class="text-xs bg-cyan-100 text-cyan-800 px-3 py-1 rounded-full">{{ $project->features }}</span>
                        <span class="text-xs bg-gray-200 dark:bg-gray-700 px-3 py-1 rounded-full">{{ $project->tech_stack }}</span>
                    </div>
                    @if($project->github_link)
                    <a href="{{ $project->github_link }}" target="_blank" class="inline-flex items-center gap-2 bg-black text-white px-4 py-2 rounded-full text-sm hover:bg-gray-800">
                        <i class="bi bi-github"></i> GitHub
                    </a>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Education -->
<section class="py-12">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-center text-cyan-600 dark:text-yellow-400 mb-8">Pendidikan</h2>
        <div class="space-y-8 max-w-2xl mx-auto">
            @foreach($educations as $edu)
            <div class="bg-white dark:bg-gray-800 p-6 rounded-xl shadow-lg border-l-4 border-cyan-500 dark:border-yellow-500">
                <h3 class="text-xl font-bold">{{ $edu->institution }}</h3>
                @if($edu->program)
                    <p class="text-cyan-600 dark:text-yellow-400 font-medium">{{ $edu->program }}</p>
                @endif
                <p class="text-sm text-gray-600 dark:text-gray-400 mt-2 flex items-center gap-2">
                    <i class="bi bi-calendar"></i> {{ $edu->year }}
                </p>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Sertifikasi -->
<section class="py-12 bg-gray-50 dark:bg-gray-900">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-center text-cyan-600 dark:text-yellow-400 mb-8">Sertifikasi</h2>
        <div class="grid md:grid-cols-3 gap-8">
            @foreach($certificates as $cert)
            <div class="text-center">
                @if($cert->image && Storage::disk('public')->exists($cert->image))
                    <img src="{{ asset('storage/' . $cert->image) }}" 
                         alt="{{ $cert->name }}" class="w-full h-48 object-cover rounded-xl shadow-xl hover:scale-105 transition">
                @else
                    <div class="w-full h-48 bg-gray-200 dark:bg-gray-700 rounded-xl flex items-center justify-center">
                        <i class="bi bi-award text-4xl text-gray-400"></i>
                    </div>
                @endif
                <p class="mt-4 font-bold text-lg">{{ $cert->name }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Debug Section (Hapus setelah fix) -->
@if($profile->photo)
<div class="fixed bottom-4 left-4 bg-red-500 text-white p-3 rounded-lg text-xs z-50 max-w-xs">
    <strong>Debug Info:</strong><br>
    Photo Path: {{ $profile->photo }}<br>
    Storage Exists: {{ Storage::disk('public')->exists($profile->photo) ? 'Yes' : 'No' }}<br>
    Full URL: {{ asset('storage/' . $profile->photo) }}
</div>
@endif
@endsection