@extends('dashboard.layout')

@section('konten')
<div class="card">
    <div class="card-body">

        <div class="mb-3">
            <a href="{{ route('service.index') }}" class="btn btn-secondary btn-sm">
                ← Kembali
            </a>
        </div>

        <h4 class="card-title mb-4">Edit Service</h4>

        <form action="{{ route('service.update', $service->id) }}"
              method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Icon</label>
                <input type="text"
                       name="icon"
                       class="form-control @error('icon') is-invalid @enderror"
                       value="{{ old('icon', $service->icon) }}">
                <small class="text-muted">
                    Contoh: &lt;i class="bi bi-code-slash"&gt;&lt;/i&gt;
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
                       value="{{ old('job', $service->job) }}">
                @error('job')
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
