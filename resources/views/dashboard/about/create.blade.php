@extends('dashboard.layout')

@section('konten')
<div class="card">
    <div class="card-body">

        <div class="mb-3">
            <a href="{{ route('about.index') }}" class="btn btn-secondary btn-sm">
                ← Kembali
            </a>
        </div>

        <h4 class="card-title mb-4">Tambah</h4>

        <form action="{{ route('about.store') }}" method="POST" enctype="multipart/form-data">

            @csrf

            <div class="mb-3">
                <label class="form-label">Foto</label>
                <input type="file"
                    name="image"
                    class="form-control @error('image') is-invalid @enderror">
                @error('image')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Nama</label>
                <input type="text"
                       name="name"
                       class="form-control @error('name') is-invalid @enderror"
                       value="{{ old('name') }}">
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Tanggal Lahir</label>
                <input type="date"
                       name="born"
                       class="form-control @error('born') is-invalid @enderror"
                       value="{{ old('born') }}">
                @error('born')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Alamat</label>
                <textarea name="address"
                          rows="2"
                          class="form-control @error('address') is-invalid @enderror">{{ old('address') }}</textarea>
                @error('address')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Kode Pos</label>
                <input type="number"
                       name="zip_code"
                       class="form-control @error('zip_code') is-invalid @enderror"
                       value="{{ old('zip_code') }}">
                @error('zip_code')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email"
                       name="email"
                       class="form-control @error('email') is-invalid @enderror"
                       value="{{ old('email') }}">
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">No. HP</label>
                <input type="text"
                       name="phone"
                       class="form-control @error('phone') is-invalid @enderror"
                       value="{{ old('phone') }}">
                @error('phone')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Pekerjaan</label>
                <input type="text"
                       name="work"
                       class="form-control @error('work') is-invalid @enderror"
                       value="{{ old('work') }}">
                @error('work')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Total Project</label>
                <input type="number"
                       name="total_project"
                       class="form-control @error('total_project') is-invalid @enderror"
                       value="{{ old('total_project', 0) }}">
                @error('total_project')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label class="form-label">Deskripsi</label>
                <textarea name="description"
                          rows="4"
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
