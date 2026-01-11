@extends('dashboard.layout')

@section('konten')
<div class="card">
    <div class="card-body">

        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="card-title mb-0">Tabel Blog</h4>
            <a href="{{ route('blog.create') }}" class="btn btn-primary">
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
                        <th>Gambar</th>
                        <th>Judul</th>
                        <th>Author</th>
                        <th>Tanggal</th>
                        <th width="22%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($data as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>

                            <td>
                                @if ($item->image)
                                    <img src="{{ asset('storage/' . $item->image) }}"
                                         width="70" height="50"
                                         class="rounded border"
                                         style="object-fit: cover;">
                                @else
                                    <span class="text-muted">Belum ada</span>
                                @endif
                            </td>

                            <td>{{ $item->title }}</td>
                            <td>{{ $item->author ?? '-' }}</td>

                            <td>
                                @if($item->date)
                                    {{ \Carbon\Carbon::parse($item->date)->format('d M Y') }}
                                @else
                                    <span class="text-muted">-</span>
                                @endif
                            </td>

                            <td>
                                <a href="{{ route('blog.show', $item->id) }}"
                                   class="btn btn-sm btn-info">
                                    Detail
                                </a>

                                <a href="{{ route('blog.edit', $item->id) }}"
                                   class="btn btn-sm btn-warning">
                                    Edit
                                </a>

                                <form action="{{ route('blog.destroy', $item->id) }}"
                                      method="POST"
                                      class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger"
                                            onclick="return confirm('Yakin hapus blog ini?')">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted">
                                Belum ada data blog
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>
</div>
@endsection
