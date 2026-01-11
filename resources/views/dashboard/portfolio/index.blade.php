@extends('dashboard.layout')

@section('konten')
<div class="card">
    <div class="card-body">

        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="card-title mb-0">Portfolio</h4>
            <a href="{{ route('portfolio.create') }}" class="btn btn-primary">
                + Tambah Portfolio
            </a>
        </div>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th width="5%">No</th>
                        <th>Judul</th>
                        <th>Kategori</th>
                        <th>Instansi</th>
                        <th>Periode</th>
                        <th width="15%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($data as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->judul }}</td>
                            <td>
                                <span class="badge bg-info text-dark">
                                    {{ ucfirst($item->kategori) }}
                                </span>
                            </td>
                            <td>{{ $item->instansi }}</td>
                            <td>
                                {{ \Carbon\Carbon::parse($item->tanggal_mulai)->format('M Y') }}
                                -
                                {{ $item->tanggal_selesai
                                    ? \Carbon\Carbon::parse($item->tanggal_selesai)->format('M Y')
                                    : 'Sekarang'
                                }}
                            </td>
                            <td>
                                <a href="{{ route('portfolio.edit', $item->id) }}"
                                class="btn btn-sm btn-warning">
                                    Edit
                                </a>

                                <a href="{{ route('portfolio.show', $item->id) }}" class="btn btn-info btn-sm">
                                    Detail
                                </a>

                                <form action="{{ route('portfolio.destroy', $item->id) }}"
                                    method="POST"
                                    class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger"
                                        onclick="return confirm('Yakin hapus portfolio ini?')">
                                        Hapus
                                    </button>
                                </form>
                            </td>

                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted">
                                Data portfolio belum ada
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>
</div>
@endsection
