@extends('dashboard.layout')

@section('konten')
<div class="card">
    <div class="card-body">

        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="card-title mb-0">Tabel About</h4>
            <a href="{{ route('about.create') }}" class="btn btn-primary">
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
                        <th>Foto</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Pekerjaan</th>
                        <th>Total Project</th>
                        <th width="18%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($data as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                @if ($item->image)
    <img
        class="img-fluid img-profile rounded-circle mx-auto mb-2"
        src="{{ asset('storage/' . $item->image) }}"
        alt="{{ $item->name }}"
        style="width:40px; height:40px; object-fit:cover;"
    />


                                    <span class="text-muted">-</span>
                                @endif
                            </td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->work }}</td>
                            <td>{{ $item->total_project }}</td>
                            <td>
                                <a href="{{ route('about.show', $item->id) }}"
                                   class="btn btn-sm btn-info">
                                    Detail
                                </a>

                                <a href="{{ route('about.edit', $item->id) }}"
                                   class="btn btn-sm btn-warning">
                                    Edit
                                </a>

                                <form action="{{ route('about.destroy', $item->id) }}"
                                      method="POST"
                                      class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger"
                                        onclick="return confirm('Yakin hapus profile ini?')">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted">
                                Data About belum ada
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>
</div>
@endsection
