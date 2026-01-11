<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    public function index()
    {
        $data = Project::latest()->get();
        return view('dashboard.project.index', compact('data'));
    }

    public function create()
    {
        return view('dashboard.project.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'       => 'required',
            'job'         => 'nullable',
            'category'    => 'nullable',
            'description' => 'nullable',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png|max:5120',
        ]);

        $data = $request->all();

        // upload gambar
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('project', 'public');
        }

        Project::create($data);

        return redirect()
            ->route('project.index')
            ->with('success', 'Project berhasil ditambahkan');
    }

    public function show(Project $project)
    {
        return view('dashboard.project.show', compact('project'));
    }

    public function edit(Project $project)
    {
        return view('dashboard.project.edit', compact('project'));
    }

    public function update(Request $request, Project $project)
    {
        $request->validate([
            'title'       => 'required',
            'job'         => 'nullable',
            'category'    => 'nullable',
            'description' => 'nullable',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->all();

        // kalo upload gambar baru
        if ($request->hasFile('image')) {

            // hapus gambar lama
            if ($project->image) {
                Storage::disk('public')->delete($project->image);
            }

            $data['image'] = $request->file('image')->store('project', 'public');
        }

        $project->update($data);

        return redirect()
            ->route('project.index')
            ->with('success', 'Project berhasil diperbarui');
    }

    public function destroy(Project $project)
    {
        // hapus gambar
        if ($project->image) {
            Storage::disk('public')->delete($project->image);
        }

        $project->delete();

        return redirect()
            ->route('project.index')
            ->with('success', 'Project berhasil dihapus');
    }
}
