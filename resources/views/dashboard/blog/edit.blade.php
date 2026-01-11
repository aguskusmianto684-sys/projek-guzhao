@extends('dashboard.layout')

@section('konten')
<div class="card">
    <div class="card-body">

        <div class="mb-3">
            <a href="{{ route('blog.index') }}" class="btn btn-secondary btn-sm">
                ← Kembali
            </a>
        </div>

        <h4 class="card-title mb-4">Edit Blog</h4>

        <form action="{{ route('blog.update', $blog->id) }}"
              method="POST"
              enctype="multipart/form-data">
            @csrf
            @method('PUT')

            {{-- thumbnail saat ini --}}
            @if ($blog->image)
                <div class="mb-3">
                    <label class="form-label">Thumbnail Saat Ini</label><br>
                    <img src="{{ asset('storage/' . $blog->image) }}"
                         width="150"
                         class="rounded border">
                </div>
            @endif

            {{-- ganti thumbnail --}}
            <div class="mb-3">
                <label class="form-label">Ganti Thumbnail</label>
                <input type="file"
                       name="image"
                       class="form-control @error('image') is-invalid @enderror">
                @error('image')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- title --}}
            <div class="mb-3">
                <label class="form-label">Title</label>
                <input type="text"
                       name="title"
                       class="form-control @error('title') is-invalid @enderror"
                       value="{{ old('title', $blog->title) }}">
                @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- author --}}
            <div class="mb-3">
                <label class="form-label">Author</label>
                <input type="text"
                       name="author"
                       class="form-control @error('author') is-invalid @enderror"
                       value="{{ old('author', $blog->author) }}">
                @error('author')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- date --}}
            <div class="mb-3">
                <label class="form-label">Tanggal Publikasi</label>
                <input type="date"
                       name="date"
                       class="form-control @error('date') is-invalid @enderror"
                       value="{{ old('date', $blog->date) }}">
                @error('date')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- description --}}
            <div class="mb-4">
                <label class="form-label">Konten Blog</label>
                <textarea name="description"
                          rows="5"
                          class="form-control @error('description') is-invalid @enderror">{{ old('description', $blog->description) }}</textarea>
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
