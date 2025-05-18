<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\View\View;

class PasswordResetLinkController extends Controller
{
    /**
     * Menampilkan halaman form untuk meminta link reset password.
     */
    public function create(): View
    {
        // Mengembalikan view 'auth.forgot-password' yang berisi form input email
        return view('auth.forgot-password');
    }

    /**
     * Menangani permintaan kirim link reset password.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        // Validasi input email: wajib diisi dan harus format email yang valid
        $request->validate([
            'email' => ['required', 'email'],
        ]);

        // Mencoba mengirimkan link reset password ke email yang diberikan
        $status = Password::sendResetLink(
            $request->only('email')  // Ambil hanya field email dari request
        );

        // Cek hasil pengiriman link reset password:
        // Jika berhasil, kembali ke halaman sebelumnya dengan pesan status sukses
        // Jika gagal, kembali ke halaman sebelumnya dengan input email yang sudah dimasukkan
        // dan tampilkan pesan error sesuai status yang diterima
        return $status == Password::RESET_LINK_SENT
                    ? back()->with('status', __($status))
                    : back()->withInput($request->only('email'))
                        ->withErrors(['email' => __($status)]);
    }
}
