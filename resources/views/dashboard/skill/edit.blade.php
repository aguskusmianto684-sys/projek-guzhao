@extends('dashboard.layout')

@section('konten')
<div class="card">
    <div class="card-body">

        <div class="mb-3">
            <a href="{{ route('skill.index') }}" class="btn btn-secondary btn-sm">
                ← Kembali
            </a>
        </div>

        <h4 class="card-title mb-4">Edit Skill</h4>

        <form action="{{ route('skill.update', $skill->id) }}" method="POST">
            @csrf
            @method('PUT')

            {{-- Nama Skill --}}
            <div class="mb-3">
                <label class="form-label">Nama Skill</label>
                <input type="text"
                       name="skill"
                       class="form-control @error('skill') is-invalid @enderror"
                       value="{{ old('skill', $skill->skill) }}">
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
                       value="{{ old('percent', $skill->percent) }}">
                @error('percent')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Deskripsi --}}
            <div class="mb-4">
                <label class="form-label">Deskripsi</label>
                <textarea name="description"
                          rows="4"
                          class="form-control @error('description') is-invalid @enderror">{{ old('description', $skill->description) }}</textarea>
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
