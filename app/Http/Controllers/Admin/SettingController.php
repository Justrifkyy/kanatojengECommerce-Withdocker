<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        // Ambil semua setting atau buat nilai default jika belum ada
        $settings = Setting::all()->keyBy('key');
        return view('admin.settings.index', compact('settings'));
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'whatsapp_number' => 'required|string|max:20',
        ]);

        // Gunakan updateOrCreate untuk membuat atau memperbarui setting
        Setting::updateOrCreate(
            ['key' => 'whatsapp_number'],
            ['value' => $data['whatsapp_number']]
        );

        return back()->with('success', 'Pengaturan berhasil diperbarui.');
    }
}
