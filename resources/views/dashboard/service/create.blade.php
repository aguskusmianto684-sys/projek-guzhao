@extends('dashboard.layout')

@section('konten')
<div class="card">
    <div class="card-body">

        <div class="mb-3">
            <a href="{{ route('service.index') }}" class="btn btn-secondary btn-sm">
                ← Kembali
            </a>
        </div>

        <h4 class="card-title mb-4">Tambah Service</h4>

        <form action="{{ route('service.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label class="form-label">Icon</label>
                <input type="text"
                       name="icon"
                       class="form-control @error('icon') is-invalid @enderror"
                       value="{{ old('icon') }}"
                       placeholder='<i class="bi bi-code-slash"></i>'>
                <small class="text-muted">
                    Masukkan HTML icon (Bootstrap Icon / FontAwesome)
                </small>
                @error('icon')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label class="form-label">Nama Service</label>
                <input type="text"
                       name="job"
                       class="form-control @error('job') is-invalid @enderror"
                       value="{{ old('job') }}">
                @error('job')
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
