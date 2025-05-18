<?php

namespace App\Http\Controllers\Auth;

// Mengimpor class-class yang dibutuhkan
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class PasswordController extends Controller
{
    /**
     * Fungsi untuk mengupdate password user.
     */
    public function update(Request $request): RedirectResponse
    {
        // Validasi input dari user dengan rules:
        // 'current_password' wajib diisi dan harus cocok dengan password user saat ini (cek otomatis)
        // 'password' wajib diisi, harus memenuhi standar keamanan password Laravel (Password::defaults()),
        // dan harus sama dengan 'password_confirmation' (karena 'confirmed')
        $validated = $request->validateWithBag('updatePassword', [
            'current_password' => ['required', 'current_password'],
            'password' => ['required', Password::defaults(), 'confirmed'],
        ]);

        // Update password user yang sedang login dengan password baru yang sudah di-hash (aman)
        $request->user()->update([
            'password' => Hash::make($validated['password']),
        ]);

        // Kembali ke halaman sebelumnya dengan pesan status 'password-updated'
        return back()->with('status', 'password-updated');
    }
}
