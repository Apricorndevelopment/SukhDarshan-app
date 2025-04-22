<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Blog;

class AuthController extends Controller
{
    public function index()
    {
        $users = User::where('role', 'user')->paginate(10);
        return view('admin.users', compact('users'));
    }

    public function showloginform()
    {
        $recentBlogs = Blog::orderBy('created_at', 'desc')->take(3)->get();
        return view('login', compact('recentBlogs'));
    }

    public function showAdminLoginForm()
    {
        $recentBlogs = Blog::orderBy('created_at', 'desc')->take(3)->get();
        return view('admin.adminlogin', compact('recentBlogs'));
    }

    public function showregisterform()
    {
        $recentBlogs = Blog::orderBy('created_at', 'desc')->take(3)->get();
        return view('Auth.register', compact('recentBlogs'));
    }

    public function register(Request $request)
    {
        $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'phone' => 'required|string|max:15',
            'password' => 'required|min:8|confirmed',
        ]);

        User::create([
            'name' => $request->full_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
            'role' => 'user',
        ]);

        return redirect()->route('login')->with('success', 'Registration successful. Please login.');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $email = $request->email;
        $password = $request->password;

        if ($request->is('admin/login')) {
            if (
                Auth::attempt(['email' => $email, 'password' => $password, 'role' => 'admin'])
            ) {
                $request->session()->regenerate();
                session(['admin_logged_in' => true]);
                return redirect()->route('admin.dashboard');
            } else {
                return back()->withErrors(['Invalid admin credentials']);
            }
        }

        // User login
        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            $request->session()->regenerate();

            if (Auth::user()->role === 'user') {
                // return redirect()->intended(route('user.dashboard'));
                return redirect()->intended(route('carthome'));
            } else {
                Auth::logout();
                return back()->withErrors(['Invalid user role.']);
            }
        }

        return back()->withErrors(['Invalid credentials']);
    }

    public function logout(Request $request)
    {
        if (session('admin_logged_in')) {
            $request->session()->forget('admin_logged_in');
        } else {
            Auth::logout();
        }

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }

    public function dashboard()
    {
        if (session('admin_logged_in')) {
            return view('admin.dashboard');
        } elseif (Auth::check() && Auth::user()->role === 'user') {
            return view('user.dashboard');
        }

        return redirect()->route('Auth.login');
    }
}
