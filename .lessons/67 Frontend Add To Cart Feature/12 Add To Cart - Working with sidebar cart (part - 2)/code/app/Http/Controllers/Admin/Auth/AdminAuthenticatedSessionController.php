<?php
namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AdminAuthenticatedSessionController extends Controller
{
    public function create()
    {
        return view('admin.auth.login');
    }

    public function store(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Yalnız admin daxil ola bilər
            if (Auth::user()->role !== 'admin') {
                Auth::logout();
                return redirect()->route('login')->withErrors([
                    'email' => 'Sizin bu hissəyə daxil olmaq icazəniz yoxdur.',
                ]);
            }

            return redirect()->intended('/admin/dashboard');
        }
        throw ValidationException::withMessages([
            'email' => __('Bu məlumatlar uyğun deyil.'),
        ]);
    }

    public function destroy(Request $request)
    {
        Auth::guard()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('admin.login');
    }
}
