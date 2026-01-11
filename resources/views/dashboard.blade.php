@extends('layouts.admin')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-3 gap-6">
    <div class="bg-white p-4 rounded shadow">About</div>
    <div class="bg-white p-4 rounded shadow">Projects</div>
    <div class="bg-white p-4 rounded shadow">Skills</div>
</div>
@endsection
