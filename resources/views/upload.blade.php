@extends('layouts.app')

@section('content')
    <h1 class="text-3xl font-bold mb-4">Upload Gambar</h1>

    <!-- Upload Profil -->
    <form action="{{ route('upload.profile') }}" method="POST" enctype="multipart/form-data" class="mb-8">
        @csrf
        <label class="block mb-2">Foto Profil (JPG/PNG):</label>
        <input type="file" name="profile_photo" class="mb-2">
        <button type="submit" class="btn btn-primary">Upload</button>
    </form>

    <!-- Upload Sertifikat -->
    @foreach(['Junior Photographer', 'Editor', 'Camera Operator'] as $name)
        <form action="{{ route('upload.certificate', $name) }}" method="POST" enctype="multipart/form-data" class="mb-8">
            @csrf
            <label class="block mb-2">Sertifikat {{ $name }} (JPG/PNG):</label>
            <input type="file" name="certificate_image" class="mb-2">
            <button type="submit" class="btn btn-primary">Upload {{ $name }}</button>
        </form>
    @endforeach

    <!-- Upload Project (Manual via File Explorer) -->
    <p>Untuk gambar project Foodinary, copy file JPG/PNG ke public/uploads/projects/foodinary.jpg via File Explorer.</p>

    @if(session('success'))
        <p class="text-green-500">{{ session('success') }}</p>
    @endif
@endsection