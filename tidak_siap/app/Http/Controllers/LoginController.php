<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class LoginController extends Controller
{
    /**
     * Menampilkan halaman login.
     *
     * @return \Illuminate\View\View
     */
    public function showLoginForm()
    {
        return view('login');  // Pastikan view login.blade.php ada di resources/views/auth
    }

    /**
     * Melakukan autentikasi login.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Cek kredensial login
        $user = User::where('email', $request->email)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            // Autentikasi berhasil, login pengguna
            Auth::login($user);

            // Redirect berdasarkan role pengguna
            switch ($user->role) {
                case 'mahasiswa':
                    return redirect()->route('mahasiswa.dashboard'); // Ganti sesuai rute mahasiswa
                case 'dosen':
                    return redirect()->route('dosen.dashboard'); // Ganti sesuai rute dosen
                case 'akademik':
                    return redirect()->route('akademik.dashboard'); // Ganti sesuai rute akademik
                default:
                    return redirect()->route('home'); // Default jika tidak ada role yang cocok
            }
        } else {
            // Login gagal, beri pesan error
            return redirect()->back()->withErrors(['email' => 'Email atau password salah.'])->withInput();
        }
    }

    /**
     * Logout pengguna dan mengarahkan ke halaman login.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');  // Pastikan ada rute untuk login
    }
}
