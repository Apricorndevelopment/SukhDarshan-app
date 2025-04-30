<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Blog;
use App\Models\User;
use App\Models\Companylogo;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Password;

class AuthController extends Controller
{
    public function index()
    {
        $users = User::where('role', 'user')->paginate(10);
        $logo = Companylogo::first();
        return view('admin.users', compact('users', 'logo'));
    }

    public function showloginform()
    {
        $recentBlogs = Blog::orderBy('created_at', 'desc')->take(3)->get();
        $logo = Companylogo::first();
        return view('login', compact('recentBlogs', 'logo'));
    }

    public function showAdminLoginForm()
    {
        $recentBlogs = Blog::orderBy('created_at', 'desc')->take(3)->get();
        $logo = Companylogo::first();
        return view('admin.adminlogin', compact('recentBlogs', 'logo'));
    }

    public function showregisterform()
    {
        $recentBlogs = Blog::orderBy('created_at', 'desc')->take(3)->get();
        $logo = Companylogo::first();
        return view('Auth.register', compact('recentBlogs', 'logo'));
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
                return redirect()->intended(route('user.dashboard'));
                // return redirect()->intended(route('carthome'));
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

        $logo = Companylogo::first();
        if (session('admin_logged_in')) {
            return view('admin.dashboard', compact('logo'));
        } elseif (Auth::check() && Auth::user()->role === 'user') {
            return view('user.dashboard', compact('logo'));
        }

        return redirect()->route('Auth.login', compact('logo'));
    }

    public function forgetpasswordform()
    {
        $logo = Companylogo::first();
        return view('forgetpassword.forgetpassword', compact('logo'));
    }

    public function submitforgetpasswordform(Request $request)
    {

        $request->validate([
            'email' => 'required|email|exists:users'
        ]);

        $token = Str::random(64);
        DB::table('password_reset_tokens')->where('email', $request->email)->delete();
        DB::table('password_reset_tokens')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now(),
        ]);

        Mail::send('forgetpassword.email', ['token' => $token], function ($message) use ($request) {
            $message->to($request->email);
            $message->subject('Reset Password');
        });
        return redirect()->route('login');
    }

    public function showresettpasswordform($token)
    {
        $logo = Companylogo::first();
        return view('forgetpassword.resetpassword', ['token' => $token], compact('logo'));
    }

    public function submitresetpasswordform(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required',
        ]);

        $updatepassword = DB::table('password_reset_tokens')->where([
            'email' => $request->email,
            'token' => $request->token,
        ])->first();

        if (!$updatepassword) {
            return back()->withInput()->with('error', 'Invalid Token');
        }

        User::where('email', $request->email)->update([
            'password' => Hash::make($request->password)
        ]);

        DB::table('password_reset_tokens')->where(['email' => $request->email])->delete();

        return redirect()->route('login')->with('status', 'Password has been successfully reset!');
    }


    public function profile()
    {
        $admin = Auth::user();
        return view('admin.profile', compact('admin'));
    }

    public function updateProfile(Request $request)
    {
        $admin = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $admin->name = $request->name;

        if ($request->hasFile('profile_image')) {
            // Delete old image if exists
            if ($admin->profile_image && Storage::disk('public')->exists($admin->profile_image)) {
                Storage::disk('public')->delete($admin->profile_image);
            }

            // Save new image
            $path = $request->file('profile_image')->store('admin_profiles', 'public');
            $admin->profile_image = $path;
        }

        $admin->save();

        return back()->with('success', 'Profile updated successfully.');
    }
}
