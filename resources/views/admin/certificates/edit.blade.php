@extends('layouts.admin')

@section('content')
<h2 class="text-2xl font-bold mb-6">{{ isset($certificate) ? 'Edit' : 'Tambah' }} Sertifikat</h2>

<form method="POST" action="{{ isset($certificate) ? route('admin.certificates.update', $certificate) : route('admin.certificates.store') }}" class="max-w-xl">
    @csrf
    @if(isset($certificate)) @method('PUT') @endif

    <div class="mb-5">
        <label class="block text-sm font-medium mb-2">Nama Sertifikat</label>
        <input type="text" name="name" value="{{ old('name', $certificate->name ?? '') }}" required class="w-full px-4 py-2 border rounded-lg dark:bg-gray-700">
    </div>

    <button type="submit" class="bg-light-cyan hover:bg-cyan-600 text-white px-6 py-2 rounded-lg">Simpan</button>
    <a href="{{ route('admin.certificates.index') }}" class="ml-3 bg-gray-500 hover:bg-gray-600 text-white px-6 py-2 rounded-lg inline-block">Kembali</a>
</form>
@endsection