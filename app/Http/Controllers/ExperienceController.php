<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Riwayat;
use Illuminate\Support\Facades\Session;

class ExperienceController extends Controller
{
    public function index()
    {
        $data = Riwayat::where('tipe', 'experience')->get();
        return view('dashboard.experience.index', compact('data'));
    }

    public function create()
    {
        return view('dashboard.experience.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'info1' => 'required',
            'tgl_mulai' => 'required',
            'isi' => 'required',
        ]);

        Riwayat::create([
            'judul' => $request->judul,
            'info1' => $request->info1,
            'tipe' => 'experience',
            'tgl_mulai' => $request->tgl_mulai,
            'tgl_akhir' => $request->tgl_akhir,
            'isi' => $request->isi,
        ]);

        return redirect()
            ->route('experience.index')
            ->with('success', 'Experience berhasil ditambahkan');
    }
}
