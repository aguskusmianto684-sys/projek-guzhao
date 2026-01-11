@extends('dashboard.layout')

@section('konten')
<div class="card">
    <div class="card-body">

        <div class="mb-3">
            <a href="{{ route('skill.index') }}" class="btn btn-secondary btn-sm">
                ← Kembali
            </a>
            <a href="{{ route('skill.edit', $skill->id) }}" class="btn btn-warning btn-sm float-end">
                Edit
            </a>
        </div>

        <h4 class="mb-4">Detail Skill</h4>

        <table class="table table-bordered align-middle">
            <tr>
                <th width="30%">Nama Skill</th>
                <td>{{ $skill->skill }}</td>
            </tr>
            <tr>
                <th>Persentase</th>
                <td>{{ $skill->percent }}%</td>
            </tr>
            <tr>
                <th>Deskripsi</th>
                <td>{{ $skill->description ?? '-' }}</td>
            </tr>
        </table>

    </div>
</div>
@endsection
