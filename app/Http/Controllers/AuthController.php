<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function showloginform()
    {
        return view('Auth.login');
    }

    public function showAdminLoginForm()
    {
        return view('admin.adminlogin');
    }

    public function showregisterform()
    {
        return view('Auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|confirmed',
        ]);

        User::create([
            'name' => $request->full_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'user',
        ]);

        return redirect()->route('Auth.login')->with('success', 'Registration successful. Please login.');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');

        // Admin login
        if ($request->is('admin/login')) {
            if (
                $credentials['username'] === 'ayurvedaadmin@gmail.com' &&
                $credentials['password'] === 'admin123456789'
            ) {
                session(['admin_logged_in' => true]);
                return redirect()->route('admin.dashboard');
            } else {
                return back()->withErrors(['Invalid admin credentials']);
            }
        }

        // User login
        if (Auth::attempt(['email' => $credentials['username'], 'password' => $credentials['password']])) {
            $request->session()->regenerate();
            if (Auth::user()->role === 'user') {
                return redirect()->route('user.dashboard');
            }
        }

        return back()->withErrors(['Invalid credentials']);
    }

    public function logout(Request $request)
    {
        if (session('admin_logged_in')) {
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect()->route('admin.login');
        }

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('Auth.login');
    }

    public function dashboard()
    {
        if (session('admin_logged_in')) {
            return view('admin.dashboard');
        } elseif (Auth::check()) {
            return view('user.dashboard');
        }

        return redirect()->route('Auth.login');
    }
}
