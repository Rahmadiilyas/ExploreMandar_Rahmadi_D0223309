<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\RedirectResponse;

class VerifyEmailController extends Controller
{
    /**
     * Tandai email user yang sudah login sebagai sudah terverifikasi.
     */
    public function __invoke(EmailVerificationRequest $request): RedirectResponse
    {
        // Cek apakah email user sudah pernah diverifikasi sebelumnya
        if ($request->user()->hasVerifiedEmail()) {
            // Jika sudah, redirect ke halaman dashboard dengan query parameter verified=1
            return redirect()->intended(route('dashboard', absolute: false).'?verified=1');
        }

        // Jika belum terverifikasi, coba tandai email user sebagai terverifikasi
        if ($request->user()->markEmailAsVerified()) {
            // Jika berhasil, trigger event Verified (misal untuk log atau notifikasi)
            event(new Verified($request->user()));
        }

        // Redirect ke halaman dashboard dengan query parameter verified=1 setelah verifikasi
        return redirect()->intended(route('dashboard', absolute: false).'?verified=1');
    }
}
