<?php

namespace App\Http\Controllers\Auth;

// Mengimpor class-class yang diperlukan
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class NewPasswordController extends Controller
{
    /**
     * Menampilkan halaman reset password.
     */
    public function create(Request $request): View
    {
        // Menampilkan view 'auth.reset-password' dan mengirimkan data $request ke view tersebut
        return view('auth.reset-password', ['request' => $request]);
    }

    /**
     * Menangani permintaan reset password yang dikirim user.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        // Validasi input yang diterima dari form reset password
        $request->validate([
            'token' => ['required'],               // token reset password harus ada (dikirim lewat email)
            'email' => ['required', 'email'],     // email wajib dan harus format email valid
            'password' => ['required', 'confirmed', Rules\Password::defaults()], 
            // password wajib, harus sama dengan konfirmasi (field password_confirmation),
            // dan mengikuti aturan keamanan password default Laravel (Rules\Password::defaults())
        ]);

        // Mencoba mereset password user dengan data yang valid di atas
        $status = Password::reset(
            // Mengambil data penting dari request
            $request->only('email', 'password', 'password_confirmation', 'token'),
            // Callback function ini dijalankan jika token valid dan reset berhasil
            function (User $user) use ($request) {
                // Update password user dengan versi yang sudah di-hash (aman)
                $user->forceFill([
                    'password' => Hash::make($request->password),
                    // Generate ulang token untuk remember me, agar sesi lama invalid
                    'remember_token' => Str::random(60),
                ])->save();

                // Memicu event PasswordReset, misalnya untuk notifikasi atau log
                event(new PasswordReset($user));
            }
        );

        // Jika password berhasil di-reset, redirect ke halaman login dengan pesan sukses
        // Jika gagal, kembali ke halaman sebelumnya dengan input email dan pesan error
        return $status == Password::PASSWORD_RESET
                    ? redirect()->route('login')->with('status', __($status))
                    : back()->withInput($request->only('email'))
                        ->withErrors(['email' => __($status)]);
    }
}
