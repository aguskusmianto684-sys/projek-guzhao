<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    public function index()
    {
        $data = Skill::latest()->get();
        return view('dashboard.skill.index', compact('data'));
    }

    public function create()
    {
        return view('dashboard.skill.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'skill'       => 'required|string|max:255',
            'percent'     => 'required|numeric|min:0|max:100',
            'description' => 'nullable|string',
        ]);

        Skill::create($request->all());

        return redirect()
            ->route('skill.index')
            ->with('success', 'Skill berhasil ditambahkan');
    }

    public function show(Skill $skill)
    {
        return view('dashboard.skill.show', compact('skill'));
    }

    public function edit(Skill $skill)
    {
        return view('dashboard.skill.edit', compact('skill'));
    }

    public function update(Request $request, Skill $skill)
    {
        $request->validate([
            'skill'       => 'required|string|max:255',
            'percent'     => 'required|numeric|min:0|max:100',
            'description' => 'nullable|string',
        ]);

        $skill->update($request->all());

        return redirect()
            ->route('skill.index')
            ->with('success', 'Skill berhasil diperbarui');
    }

    public function destroy(Skill $skill)
    {
        $skill->delete();

        return redirect()
            ->route('skill.index')
            ->with('success', 'Skill berhasil dihapus');
    }
}
