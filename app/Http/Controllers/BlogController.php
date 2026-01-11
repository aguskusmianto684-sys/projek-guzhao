<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    public function index()
    {
        $data = Blog::latest()->get();
        return view('dashboard.blog.index', compact('data'));
    }

    public function create()
    {
        return view('dashboard.blog.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'   => 'required',
            'date'    => 'nullable|date',
            'author'  => 'nullable|string',
            'content' => 'nullable|string',
            'image'   => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('blog', 'public');
        }

        Blog::create($data);

        return redirect()->route('blog.index')->with('success', 'Blog berhasil ditambahkan');
    }

        public function show(blog $blog)
    {
        return view('dashboard.blog.show', compact('blog'));
    }


    public function edit(Blog $blog)
    {
        return view('dashboard.blog.edit', compact('blog'));
    }

    public function update(Request $request, Blog $blog)
    {
        $request->validate([
            'title'   => 'required',
            'date'    => 'nullable|date',
            'author'  => 'nullable|string',
            'content' => 'nullable|string',
            'image'   => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            if ($blog->image) {
                Storage::disk('public')->delete($blog->image);
            }

            $data['image'] = $request->file('image')->store('blog', 'public');
        }

        $blog->update($data);

        return redirect()->route('blog.index')->with('success', 'Blog berhasil diperbarui');
    }

    public function destroy(Blog $blog)
    {
        if ($blog->image) {
            Storage::disk('public')->delete($blog->image);
        }

        $blog->delete();

        return redirect()->route('blog.index')->with('success', 'Blog berhasil dihapus');
    }
}
