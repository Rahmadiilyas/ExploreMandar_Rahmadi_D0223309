<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class ConfirmablePasswordController extends Controller
{
    //logika konfirmasi kata sandi.
    /**
     * Show the confirm password view.
     */
    public function show(): View
    {
        return view('auth.confirm-password');
    }

    /**
     * Confirm the user's password.
     */
    public function store(Request $request): RedirectResponse
    {
        if (! Auth::guard('web')->validate([
            'email' => $request->user()->email,
            'password' => $request->password,
        ])) {
            throw ValidationException::withMessages([
                'password' => __('auth.password'),
            ]);
        }
//         Menyimpan timestamp saat password berhasil dikonfirmasi ke dalam session dengan kunci 'auth.password_confirmed_at'.
// Digunakan untuk membatasi validitas waktu konfirmasi password.
        $request->session()->put('auth.password_confirmed_at', time());

        // Mengalihkan pengguna ke halaman tujuan semula (intended), jika tidak ada, maka ke route 'dashboard'.
        return redirect()->intended(route('dashboard', absolute: false));
    }
}
