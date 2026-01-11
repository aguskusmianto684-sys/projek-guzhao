@extends('dashboard.layout')

@section('konten')
<div class="card">
    <div class="card-body">

        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="card-title mb-0">Tabel Service</h4>
            <a href="{{ route('service.create') }}" class="btn btn-primary">
                + Tambah
            </a>
        </div>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle text-center">
                <thead class="table-light">
                    <tr>
                        <th width="5%">No</th>
                        <th width="20%">Icon</th>
                        <th>Nama Service</th>
                        <th width="20%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($data as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td class="text-center">
                            @if($item->icon)
                                <img src="{{ asset('storage/'.$item->icon) }}"
                                    width="50"
                                    height="50"
                                    style="object-fit:contain">
                            @else
                                -
                            @endif
                        </td>

                            <td>{{ $item->job }}</td>
                            <td>
                                <a href="{{ route('service.show', $item->id) }}"
                                   class="btn btn-sm btn-info">
                                    Detail
                                </a>

                                <a href="{{ route('service.edit', $item->id) }}"
                                   class="btn btn-sm btn-warning">
                                    Edit
                                </a>

                                <form action="{{ route('service.destroy', $item->id) }}"
                                      method="POST"
                                      class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger"
                                        onclick="return confirm('Yakin hapus service ini?')">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center text-muted">
                                Data Service belum ada
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>
</div>
@endsection
