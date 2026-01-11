<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $data = Contact::latest()->get();
        return view('dashboard.contact.index', compact('data'));
    }

    // Contact hanya dikirim dari frontend, jadi tidak perlu create di dashboard
    // public function create() {}

    // Simpan pesan dari form contact (frontend)
    public function store(Request $request)
    {
        $request->validate([
            'name'    => 'required',
            'email'   => 'required|email',
            'subject' => 'required',
            'phone'   => 'nullable',
            'massage' => 'required',
        ]);

        Contact::create($request->all());

        return redirect()->back()->with('success', 'Pesan berhasil dikirim');
    }

    // Tidak ada edit & update

    public function destroy(Contact $contact)
    {
        $contact->delete();

        return redirect()
            ->route('contact.index')
            ->with('success', 'Pesan berhasil dihapus');
    }
}
