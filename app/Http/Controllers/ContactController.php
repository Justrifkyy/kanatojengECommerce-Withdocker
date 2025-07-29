<?php

namespace App\Http\Controllers;

use App\Models\ContactSubmission;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Menampilkan halaman formulir kontak.
     */
    public function index()
    {
        return view('pages.contact');
    }

    /**
     * Menyimpan pesan dari formulir kontak ke database.
     */
    public function store(Request $request)
    {
        // Validasi input dari form
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|min:10',
        ]);

        // Simpan data ke database
        ContactSubmission::create($validated);

        // Redirect kembali dengan pesan sukses
        return back()->with('success', 'Pesan Anda telah berhasil dikirim. Terima kasih!');
    }
}
