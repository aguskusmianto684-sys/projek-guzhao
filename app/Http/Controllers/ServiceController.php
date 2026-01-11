<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $data = Service::latest()->get();
        return view('dashboard.service.index', compact('data'));
    }

    public function create()
    {
        return view('dashboard.service.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'icon' => 'required|string',   // HTML icon
            'job'  => 'required|string|max:255',
        ]);

        Service::create($request->all());

        return redirect()
            ->route('service.index')
            ->with('success', 'Service berhasil ditambahkan');
    }

    public function edit(Service $service)
    {
        return view('dashboard.service.edit', compact('service'));
    }

    public function update(Request $request, Service $service)
    {
        $request->validate([
            'icon' => 'required|string',
            'job'  => 'required|string|max:255',
        ]);

        $service->update($request->all());

        return redirect()
            ->route('service.index')
            ->with('success', 'Service berhasil diperbarui');
    }

    public function destroy(Service $service)
    {
        $service->delete();

        return redirect()
            ->route('service.index')
            ->with('success', 'Service berhasil dihapus');
    }
}
