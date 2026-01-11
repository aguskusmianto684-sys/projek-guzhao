@extends('dashboard.layout')

@section('konten')
<div class="card">
    <div class="card-body">

        <div class="mb-3">
            <a href="{{ route('project.index') }}" class="btn btn-secondary btn-sm">
                ← Kembali
            </a>
        </div>

        <h4 class="card-title mb-4">Edit Project</h4>

        <form action="{{ route('project.update', $project->id) }}"
              method="POST"
              enctype="multipart/form-data">
            @csrf
            @method('PUT')

            @if ($project->image)
                <div class="mb-3">
                    <label class="form-label">Gambar Saat Ini</label><br>
                    <img src="{{ asset('storage/' . $project->image) }}"
                         width="150"
                         class="rounded border">
                </div>
            @endif

            <div class="mb-3">
                <label class="form-label">Ganti Gambar</label>
                <input type="file"
                       name="image"
                       class="form-control @error('image') is-invalid @enderror">
                @error('image')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Judul Project</label>
                <input type="text"
                       name="title"
                       class="form-control @error('title') is-invalid @enderror"
                       value="{{ old('title', $project->title) }}">
                @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Job</label>
                <input type="text"
                       name="job"
                       class="form-control @error('job') is-invalid @enderror"
                       value="{{ old('job', $project->job) }}">
                @error('job')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Kategori</label>
                <input type="text"
                       name="category"
                       class="form-control @error('category') is-invalid @enderror"
                       value="{{ old('category', $project->category) }}">
                @error('category')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label class="form-label">Deskripsi</label>
                <textarea name="description"
                          rows="4"
                          class="form-control @error('description') is-invalid @enderror">{{ old('description', $project->description) }}</textarea>
                @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button class="btn btn-primary">
                Update
            </button>
        </form>

    </div>
</div>
@endsection
