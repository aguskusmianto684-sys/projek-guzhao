@extends('dashboard.layout')

@section('konten')
<div class="container-fluid">
    <h4 class="mb-4">Detail Project</h4>

    {{-- Gambar Project --}}
    @if ($project->image)
        <div class="mb-4">
            <img src="{{ asset('storage/' . $project->image) }}"
                 alt="Gambar Project"
                 class="rounded shadow"
                 style="max-width: 250px">
        </div>
    @else
        <div class="mb-4 text-muted">
            Gambar belum diupload
        </div>
    @endif

    <table class="table table-bordered align-middle">
        <tr>
            <th width="25%">Judul</th>
            <td>{{ $project->title }}</td>
        </tr>
        <tr>
            <th>Job</th>
            <td>{{ $project->job ?? '-' }}</td>
        </tr>
        <tr>
            <th>Kategori</th>
            <td>{{ $project->category ?? '-' }}</td>
        </tr>
        <tr>
            <th>Deskripsi</th>
            <td>{{ $project->description ?? '-' }}</td>
        </tr>
    </table>

    <a href="{{ route('project.index') }}" class="btn btn-secondary">
        Kembali
    </a>

    <a href="{{ route('project.edit', $project->id) }}" class="btn btn-warning">
        Edit
    </a>
</div>
@endsection
