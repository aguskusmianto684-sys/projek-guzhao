@extends('dashboard.layout')

@section('konten')
<div class="container-fluid">
    <h4 class="mb-4">Detail Resume</h4>

    <table class="table table-bordered align-middle">
        <tr>
            <th width="25%">Tanggal / Tahun</th>
            <td>{{ $resume->date ?? '-' }}</td>
        </tr>
        <tr>
            <th>Pekerjaan / Posisi</th>
            <td>{{ $resume->job ?? '-' }}</td>
        </tr>
        <tr>
            <th>Tempat / Perusahaan</th>
            <td>{{ $resume->place ?? '-' }}</td>
        </tr>
        <tr>
            <th>Summary Singkat</th>
            <td>{{ $resume->summary ?? '-' }}</td>
        </tr>
        <tr>
            <th>Deskripsi Detail</th>
            <td>
                {!! nl2br(e($resume->description)) ?? '-' !!}
            </td>
        </tr>
    </table>

    <a href="{{ route('resume.index') }}" class="btn btn-secondary">
        Kembali
    </a>

    <a href="{{ route('resume.edit', $resume->id) }}" class="btn btn-warning">
        Edit
    </a>
</div>
@endsection
