<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutController extends Controller
{
    public function index()
    {
        $data = About::latest()->get();
        return view('dashboard.about.index', compact('data'));
    }

    public function create()
    {
        return view('dashboard.about.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'          => 'required',
            'born'          => 'nullable|date',
            'address'       => 'nullable',
            'zip_code'      => 'nullable|numeric',
            'email'         => 'nullable|email',
            'phone'         => 'nullable',
            'total_project' => 'nullable|numeric',
            'work'          => 'nullable',
            'description'   => 'nullable',
        'image' => 'nullable|image|mimes:jpg,jpeg,png|max:5120',

        ]);

        $data = $request->all();

        // upload gambar
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('about', 'public');
        }

        About::create($data);

        return redirect()
            ->route('about.index')
            ->with('success', 'Profile berhasil ditambahkan');
    }

    public function show(About $about)
    {
        return view('dashboard.about.show', compact('about'));
    }

    public function edit(About $about)
    {
        return view('dashboard.about.edit', compact('about'));
    }

    public function update(Request $request, About $about)
    {
        $request->validate([
            'name'          => 'required',
            'born'          => 'nullable|date',
            'address'       => 'nullable',
            'zip_code'      => 'nullable|numeric',
            'email'         => 'nullable|email',
            'phone'         => 'nullable',
            'total_project' => 'nullable|numeric',
            'work'          => 'nullable',
            'description'   => 'nullable',
            'image'         => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->all();

        // kalo upload gambar yang baru
        if ($request->hasFile('image')) {

            // ini untuk hapus gambar lama
            if ($about->image) {
                Storage::disk('public')->delete($about->image);
            }

            $data['image'] = $request->file('image')->store('about', 'public');
        }

        $about->update($data);

        return redirect()
            ->route('about.index')
            ->with('success', 'Profile berhasil diperbarui');
    }

    public function destroy(About $about)
    {
        // hapus gambar
        if ($about->image) {
            Storage::disk('public')->delete($about->image);
        }

        $about->delete();

        return redirect()
            ->route('about.index')
            ->with('success', 'Profile berhasil dihapus');
    }
}
