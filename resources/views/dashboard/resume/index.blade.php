@extends('dashboard.layout')

@section('konten')
<div class="card">
    <div class="card-body">

        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="card-title mb-0">Tabel Resume</h4>
            <a href="{{ route('resume.create') }}" class="btn btn-primary">
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
                        <th>Tanggal</th>
                        <th>Pekerjaan</th>
                        <th>Tempat</th>
                        <th>Summary</th>
                        <th width="18%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($data as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->date }}</td>
                            <td>{{ $item->job }}</td>
                            <td>{{ $item->place }}</td>
                            <td>
                                <div style="max-width: 280px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                    {{ $item->summary }}
                                </div>
                            </td>
                            <td>
                                <a href="{{ route('resume.show', $item->id) }}"
                                   class="btn btn-sm btn-info">
                                    Detail
                                </a>

                                <a href="{{ route('resume.edit', $item->id) }}"
                                   class="btn btn-sm btn-warning">
                                    Edit
                                </a>

                                <form action="{{ route('resume.destroy', $item->id) }}"
                                      method="POST"
                                      class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger"
                                        onclick="return confirm('Yakin hapus data ini?')">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted">
                                Data Resume belum ada
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>
</div>
@endsection
