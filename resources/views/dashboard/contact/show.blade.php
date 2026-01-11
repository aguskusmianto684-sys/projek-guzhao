@extends('dashboard.layout')

@section('konten')
<div class="card">
    <div class="card-body">

        <a href="{{ route('contact.index') }}" class="btn btn-secondary btn-sm mb-3">
            ← Kembali
        </a>

        <h4 class="mb-4">Detail Pesan</h4>

        <table class="table table-bordered">
            <tr>
                <th width="30%">Nama</th>
                <td>{{ $contact->name }}</td>
            </tr>
            <tr>
                <th>Email</th>
                <td>{{ $contact->email }}</td>
            </tr>
            <tr>
                <th>No HP</th>
                <td>{{ $contact->phone ?? '-' }}</td>
            </tr>
            <tr>
                <th>Subject</th>
                <td>{{ $contact->subject }}</td>
            </tr>
            <tr>
                <th>Pesan</th>
                <td>{{ $contact->massage }}</td>
            </tr>
        </table>

    </div>
</div>
@endsection
