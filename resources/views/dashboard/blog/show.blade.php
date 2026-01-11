@extends('dashboard.layout')

@section('konten')
<div class="container-fluid">

    <h4 class="mb-4">Detail Blog</h4>

    {{-- Thumbnail --}}
    @if (!empty($blog->image))
        <div class="mb-4">
            <img src="{{ asset('storage/' . $blog->image) }}"
                 alt="Thumbnail"
                 class="rounded shadow"
                 style="max-width: 280px; object-fit: cover;">
        </div>
    @else
        <div class="mb-4 text-muted">
            <i>Thumbnail belum diupload</i>
        </div>
    @endif

    <table class="table table-bordered align-middle">
        <tr>
            <th width="25%">Judul</th>
            <td>{{ $blog->title ?? '-' }}</td>
        </tr>

        <tr>
            <th>Tanggal</th>
            <td>{{ $blog->date ?? '-' }}</td>
        </tr>

        <tr>
            <th>Kategori</th>
            <td>{{ $blog->category ?? '-' }}</td>
        </tr>

        <tr>
            <th>Tag</th>
            <td>{{ $blog->tag ?? '-' }}</td>
        </tr>

        <tr>
            <th>Isi</th>
            <td style="white-space: pre-line;">
                {{ $blog->content ?? '-' }}
            </td>
        </tr>
    </table>

    <a href="{{ route('blog.index') }}" class="btn btn-secondary">
        Kembali
    </a>

    <a href="{{ route('blog.edit', $blog->id) }}" class="btn btn-warning">
        Edit
    </a>
</div>
@endsection
