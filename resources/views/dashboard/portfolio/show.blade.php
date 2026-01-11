@extends('dashboard.layout')

@section('konten')
<div class="container-fluid">
    <h2>Detail Portfolio</h2>

    <table class="table table-bordered">
        <tr>
            <th>Judul</th>
            <td>{{ $portfolio->judul }}</td>
        </tr>
        <tr>
            <th>Kategori</th>
            <td>{{ $portfolio->kategori }}</td>
        </tr>
        <tr>
            <th>Instansi</th>
            <td>{{ $portfolio->instansi }}</td>
        </tr>
        <tr>
            <th>Tanggal Mulai</th>
            <td>{{ $portfolio->tanggal_mulai }}</td>
        </tr>
        <tr>
            <th>Deskripsi</th>
            <td>{{ $portfolio->deskripsi }}</td>
        </tr>
    </table>

    <a href="{{ route('portfolio.index') }}" class="btn btn-secondary">Kembali</a>
    <a href="{{ route('portfolio.edit', $portfolio->id) }}" class="btn btn-warning">Edit</a>
</div>
@endsection
