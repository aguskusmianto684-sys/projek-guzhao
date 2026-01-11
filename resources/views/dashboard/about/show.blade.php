@extends('dashboard.layout')

@section('konten')
<div class="container-fluid">
    <h4 class="mb-4">Detail Personal Profile</h4>

    {{-- foto bagian profile --}}
    @if ($about->image)
        <div class="mb-4">
            <img src="{{ asset('storage/' . $about->image) }}"
                 alt="Foto Profile"
                 class="rounded shadow"
                 style="max-width: 180px">
        </div>
    @else
        <div class="mb-4 text-muted">
            Foto belum diupload
        </div>
    @endif

    <table class="table table-bordered align-middle">
        <tr>
            <th width="25%">Nama</th>
            <td>{{ $about->name }}</td>
        </tr>
        <tr>
            <th>Tanggal Lahir</th>
            <td>{{ $about->born ?? '-' }}</td>
        </tr>
        <tr>
            <th>Alamat</th>
            <td>{{ $about->address ?? '-' }}</td>
        </tr>
        <tr>
            <th>Kode Pos</th>
            <td>{{ $about->zip_code ?? '-' }}</td>
        </tr>
        <tr>
            <th>Email</th>
            <td>{{ $about->email ?? '-' }}</td>
        </tr>
        <tr>
            <th>No. HP</th>
            <td>{{ $about->phone ?? '-' }}</td>
        </tr>
        <tr>
            <th>Pekerjaan</th>
            <td>{{ $about->work ?? '-' }}</td>
        </tr>
        <tr>
            <th>Total Project</th>
            <td>{{ $about->total_project }}</td>
        </tr>
        <tr>
            <th>Deskripsi</th>
            <td>{{ $about->description ?? '-' }}</td>
        </tr>
    </table>

    <a href="{{ route('about.index') }}" class="btn btn-secondary">
        Kembali
    </a>

    <a href="{{ route('about.edit', $about->id) }}" class="btn btn-warning">
        Edit
    </a>
</div>
@endsection
