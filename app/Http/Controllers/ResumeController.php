<?php

namespace App\Http\Controllers;

use App\Models\Resume;
use Illuminate\Http\Request;

class ResumeController extends Controller
{
    public function index()
    {
        $data = Resume::latest()->get();
        return view('dashboard.resume.index', compact('data'));
    }

    public function create()
    {
        return view('dashboard.resume.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'date'        => 'required',
            'job'         => 'required',
            'place'       => 'required',
            'summary'     => 'nullable|string|max:255',
            'description' => 'nullable|string',
        ]);

        Resume::create([
            'date'        => $request->date,
            'job'         => $request->job,
            'place'       => $request->place,
            'summary'     => $request->summary,
            'description' => $request->description,
        ]);

        return redirect()
            ->route('resume.index')
            ->with('success', 'Resume berhasil ditambahkan!');
    }

    public function show(Resume $resume)
    {
        return view('dashboard.resume.show', compact('resume'));
    }

    public function edit(Resume $resume)
    {
        return view('dashboard.resume.edit', compact('resume'));
    }

    public function update(Request $request, Resume $resume)
    {
        $request->validate([
            'date'        => 'required',
            'job'         => 'required',
            'place'       => 'required',
            'summary'     => 'nullable|string|max:255',
            'description' => 'nullable|string',
        ]);

        $resume->update([
            'date'        => $request->date,
            'job'         => $request->job,
            'place'       => $request->place,
            'summary'     => $request->summary,
            'description' => $request->description,
        ]);

        return redirect()
            ->route('resume.index')
            ->with('success', 'Resume berhasil diperbarui!');
    }

    public function destroy(Resume $resume)
    {
        $resume->delete();

        return redirect()
            ->route('resume.index')
            ->with('success', 'Resume berhasil dihapus!');
    }
}
