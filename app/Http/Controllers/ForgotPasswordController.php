<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\PasswordResetCode;

class ForgotPasswordController extends Controller
{
    public function showForgotPasswordForm()
    {
        return view('forgot-password.forgot-password');
    }

    public function sendResetCode(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ]);

        $user = User::where('email', $request->email)->first();
        
        // Generate kode OTP
        $code = PasswordResetCode::generateCode($user->email);
        
        // Kirim kode via email
        $user->sendPasswordResetCodeNotification($code);

        return redirect()->route('password.verify.code', ['email' => $user->email])
                         ->with('status', 'Kode verifikasi telah dikirim ke email Anda. Berlaku selama 10 menit.');
    }

    public function showVerifyCodeForm(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ]);

        return view('forgot-password.verify-code', ['email' => $request->email]);
    }

    public function verifyCode(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'code' => 'required|digits:6',
        ]);

        // Verifikasi kode
        $resetCode = PasswordResetCode::isValid($request->email, $request->code);

        if (!$resetCode) {
            return back()->withErrors(['code' => 'Kode verifikasi tidak valid atau telah kadaluarsa.'])->withInput(['email' => $request->email]);
        }

        // Kode valid, arahkan ke halaman reset password
        return redirect()->route('password.reset.form', ['email' => $request->email]);
    }

    public function showResetForm(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ]);

        return view('forgot-password.reset-password', ['email' => $request->email]);
    }

    public function reset(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:8|confirmed',
        ]);

        $user = User::where('email', $request->email)->first();

        // Reset password
        $user->forceFill([
            'password' => Hash::make($request->password)
        ])->setRememberToken(Str::random(60));

        $user->save();

        // Invalidate semua kode untuk email ini
        PasswordResetCode::invalidate($user->email);

        // Trigger event
        event(new PasswordReset($user));

        return redirect()->route('login')->with('status', 'Password Anda berhasil direset. Silakan login dengan password baru.');
    }
}