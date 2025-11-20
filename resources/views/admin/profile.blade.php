@extends('layouts.admin')

@section('content')
<h2 class="text-2xl font-bold mb-6">Edit Profil</h2>
<form method="POST" action="{{ route('admin.profile') }}" enctype="multipart/form-data">
    @csrf
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <input type="text" name="name" value="{{ $profile->name }}" placeholder="Nama Lengkap" class="p-2 border rounded dark:bg-gray-700" required>
        <input type="text" name="domicile" value="{{ $profile->domicile }}" placeholder="Domisili" class="p-2 border rounded dark:bg-gray-700" required>
        <input type="text" name="status" value="{{ $profile->status }}" placeholder="Status" class="p-2 border rounded dark:bg-gray-700" required>
        <textarea name="about" placeholder="About Me" class="p-2 border rounded dark:bg-gray-700 md:col-span-2">{{ $profile->about }}</textarea>
        <input type="email" name="email" value="{{ $profile->email }}" placeholder="Email" class="p-2 border rounded dark:bg-gray-700" required>
        <input type="text" name="whatsapp" value="{{ $profile->whatsapp }}" placeholder="WhatsApp" class="p-2 border rounded dark:bg-gray-700" required>
        <input type="text" name="instagram" value="{{ $profile->instagram }}" placeholder="Instagram" class="p-2 border rounded dark:bg-gray-700" required>
        <input type="text" name="github" value="{{ $profile->github }}" placeholder="GitHub" class="p-2 border rounded dark:bg-gray-700" required>
    </div>
    <button type="submit" class="mt-4 bg-light-cyan text-white px-6 py-2 rounded">Update Profil</button>
</form>

<h3 class="mt-8 text-xl font-bold">Upload Foto Profil</h3>
<form method="POST" action="{{ route('admin.profile.photo') }}" enctype="multipart/form-data" class="mt-4">
    @csrf
    <input type="file" name="photo" class="p-2 border rounded">
    <button type="submit" class="ml-2 bg-blue-600 text-white px-4 py-2 rounded">Upload</button>
</form>
@endsection