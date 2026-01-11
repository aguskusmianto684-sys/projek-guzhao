<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    public function index()
    {
        $data = Portfolio::latest()->get();
        return view('dashboard.portfolio.index', compact('data'));
    }

    public function create()
    {
        return view('dashboard.portfolio.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'kategori' => 'required',
            'instansi' => 'required',
            'tanggal_mulai' => 'required|date',
            'deskripsi' => 'required',
        ]);

        Portfolio::create($request->all());

        return redirect()
            ->route('portfolio.index')
            ->with('success', 'Portfolio berhasil ditambahkan');
    }

    public function edit(Portfolio $portfolio)
    {
        return view('dashboard.portfolio.edit', compact('portfolio'));
    }

    public function update(Request $request, Portfolio $portfolio)
    {
        $request->validate([
            'judul' => 'required',
            'kategori' => 'required',
            'instansi' => 'required',
            'tanggal_mulai' => 'required|date',
            'deskripsi' => 'required',
        ]);

        $portfolio->update($request->all());

        return redirect()
            ->route('portfolio.index')
            ->with('success', 'Portfolio berhasil diperbarui');
    }

    public function destroy(Portfolio $portfolio)
    {
        $portfolio->delete();

        return redirect()
            ->route('portfolio.index')
            ->with('success', 'Portfolio berhasil dihapus');
    }
public function show(Portfolio $portfolio)
{
    return view('dashboard.portfolio.show', compact('portfolio'));
}

}
