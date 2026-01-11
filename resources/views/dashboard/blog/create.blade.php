@extends('dashboard.layout')

@section('konten')
<div class="card">
    <div class="card-body">

        <div class="mb-3">
            <a href="{{ route('blog.index') }}" class="btn btn-secondary btn-sm">
                ← Kembali
            </a>
        </div>

        <h4 class="card-title mb-4">Tambah Blog</h4>

        <form action="{{ route('blog.store') }}"
              method="POST"
              enctype="multipart/form-data">
            @csrf

            {{-- Thumbnail --}}
            <div class="mb-3">
                <label class="form-label">Thumbnail Blog</label>
                <input type="file"
                       name="image"
                       class="form-control @error('image') is-invalid @enderror">
                @error('image')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <small class="text-muted">Format: jpg, jpeg, png — Max 2MB</small>
            </div>

            {{-- Title --}}
            <div class="mb-3">
                <label class="form-label">Judul</label>
                <input type="text"
                       name="title"
                       class="form-control @error('title') is-invalid @enderror"
                       value="{{ old('title') }}"
                       placeholder="Masukkan judul blog">
                @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Author --}}
            <div class="mb-3">
                <label class="form-label">Penulis</label>
                <input type="text"
                       name="author"
                       class="form-control @error('author') is-invalid @enderror"
                       value="{{ old('author') }}"
                       placeholder="Nama penulis">
                @error('author')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Date --}}
            <div class="mb-3">
                <label class="form-label">Tanggal Publikasi</label>
                <input type="date"
                       name="date"
                       class="form-control @error('date') is-invalid @enderror"
                       value="{{ old('date') }}">
                @error('date')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Content --}}
            <div class="mb-4">
                <label class="form-label">Konten Blog</label>
                <textarea name="description"
                          rows="6"
                          class="form-control @error('description') is-invalid @enderror"
                          placeholder="Tulis konten blog disini...">{{ old('description') }}</textarea>
                @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button class="btn btn-primary">Simpan</button>
        </form>

    </div>
</div>
@endsection
