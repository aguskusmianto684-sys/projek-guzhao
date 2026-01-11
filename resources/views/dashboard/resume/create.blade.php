@extends('dashboard.layout')

@section('konten')
<div class="card">
    <div class="card-body">

        <div class="mb-3">
            <a href="{{ route('resume.index') }}" class="btn btn-secondary btn-sm">
                ← Kembali
            </a>
        </div>

        <h4 class="card-title mb-4">Tambah Resume</h4>

        <form action="{{ route('resume.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label class="form-label">Tanggal / Tahun</label>
                <input type="text"
                       name="date"
                       placeholder="Contoh: 2020 - 2023 atau Mei 2024"
                       class="form-control @error('date') is-invalid @enderror"
                       value="{{ old('date') }}">
                @error('date')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Pekerjaan / Posisi</label>
                <input type="text"
                       name="job"
                       placeholder="Contoh: Backend Developer"
                       class="form-control @error('job') is-invalid @enderror"
                       value="{{ old('job') }}">
                @error('job')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Tempat / Perusahaan</label>
                <input type="text"
                       name="place"
                       placeholder="Contoh: PT Techno Indonesia"
                       class="form-control @error('place') is-invalid @enderror"
                       value="{{ old('place') }}">
                @error('place')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Summary Singkat</label>
                <textarea name="summary"
                          rows="2"
                          placeholder="Ringkasan singkat pekerjaan..."
                          class="form-control @error('summary') is-invalid @enderror">{{ old('summary') }}</textarea>
                @error('summary')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label class="form-label">Deskripsi Detail</label>
                <textarea name="description"
                          rows="4"
                          placeholder="Deskripsi detail pengalaman kerja / resume..."
                          class="form-control @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
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
