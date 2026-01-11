@extends('dashboard.layout')

@section('konten')
<div class="card">
    <div class="card-body">

        <div class="mb-3">
            <a href="{{ route('skill.index') }}" class="btn btn-secondary btn-sm">
                ← Kembali
            </a>
        </div>

        <h4 class="card-title mb-4">Tambah Skill</h4>

        <form action="{{ route('skill.store') }}" method="POST">
            @csrf

            {{-- Nama Skill --}}
            <div class="mb-3">
                <label class="form-label">Nama Skill</label>
                <input type="text"
                       name="skill"
                       class="form-control @error('skill') is-invalid @enderror"
                       value="{{ old('skill') }}"
                       placeholder="Contoh: Laravel, PHP, UI Design">
                @error('skill')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Persentase --}}
            <div class="mb-3">
                <label class="form-label">Persentase</label>
                <input type="number"
                       name="percent"
                       min="0"
                       max="100"
                       class="form-control @error('percent') is-invalid @enderror"
                       value="{{ old('percent') }}"
                       placeholder="0 - 100">
                @error('percent')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Deskripsi --}}
            <div class="mb-4">
                <label class="form-label">Deskripsi</label>
                <textarea name="description"
                          rows="4"
                          class="form-control @error('description') is-invalid @enderror"
                          placeholder="Penjelasan singkat tentang skill ini">{{ old('description') }}</textarea>
                @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button class="btn btn-primary">
                Simpan
            </button>
        </form>

    </div>
</div>
@endsection
