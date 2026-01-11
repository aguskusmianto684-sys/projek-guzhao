@extends('dashboard.layout')

@section('konten')
<div class="card">
    <div class="card-body">

        <div class="mb-3">
            <a href="{{ route('portfolio.index') }}" class="btn btn-secondary btn-sm">
                ← Kembali
            </a>
        </div>

        <h4 class="card-title mb-4">Tambah Portfolio</h4>

        <form action="{{ route('portfolio.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label class="form-label">Judul / Posisi</label>
                <input type="text"
                       name="judul"
                       class="form-control @error('judul') is-invalid @enderror"
                       value="{{ old('judul') }}">
                @error('judul')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Kategori</label>
                <select name="kategori"
                        class="form-select @error('kategori') is-invalid @enderror">
                    <option value="">-- Pilih Kategori --</option>
                    <option value="experience" {{ old('kategori') == 'experience' ? 'selected' : '' }}>Experience</option>
                    <option value="education" {{ old('kategori') == 'education' ? 'selected' : '' }}>Education</option>
                    <option value="project" {{ old('kategori') == 'project' ? 'selected' : '' }}>Project</option>
                </select>
                @error('kategori')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Instansi</label>
                <input type="text"
                       name="instansi"
                       class="form-control @error('instansi') is-invalid @enderror"
                       value="{{ old('instansi') }}">
                @error('instansi')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label">Tanggal Mulai</label>
                    <input type="date"
                           name="tanggal_mulai"
                           class="form-control @error('tanggal_mulai') is-invalid @enderror"
                           value="{{ old('tanggal_mulai') }}">
                    @error('tanggal_mulai')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label">Tanggal Selesai</label>
                    <input type="date"
                           name="tanggal_selesai"
                           class="form-control"
                           value="{{ old('tanggal_selesai') }}">
                </div>
            </div>

            <div class="mb-4">
                <label class="form-label">Deskripsi</label>
                <textarea name="deskripsi"
                          rows="4"
                          class="form-control @error('deskripsi') is-invalid @enderror">{{ old('deskripsi') }}</textarea>
                @error('deskripsi')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button class="btn btn-primary">
                Simpan Portfolio
            </button>
        </form>

    </div>
</div>
@endsection
