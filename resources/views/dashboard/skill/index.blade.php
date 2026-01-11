@extends('dashboard.layout')

@section('konten')
<div class="card">
    <div class="card-body">

        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="card-title mb-0">Tabel Skill</h4>
            <a href="{{ route('skill.create') }}" class="btn btn-primary">
                + Tambah
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
                        <th>Nama Skill</th>
                        <th>Persentase</th>
                        <th>Deskripsi</th>
                        <th width="18%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($data as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->skill }}</td>
                            <td>
                                <span class="badge bg-primary">
                                    {{ $item->percent }}%
                                </span>
                            </td>
                            <td>{{ $item->description ?? '-' }}</td>
                            <td>
                                <a href="{{ route('skill.show', $item->id) }}"
                                   class="btn btn-sm btn-info">
                                    Detail
                                </a>
                                <a href="{{ route('skill.edit', $item->id) }}"
                                   class="btn btn-sm btn-warning">
                                    Edit
                                </a>

                                <form action="{{ route('skill.destroy', $item->id) }}"
                                      method="POST"
                                      class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger"
                                        onclick="return confirm('Yakin hapus skill ini?')">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted">
                                Data Skill belum ada
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>
</div>
@endsection
