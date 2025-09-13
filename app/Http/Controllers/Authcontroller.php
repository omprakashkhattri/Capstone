<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    // ============================
    // ADMIN LOGIN
    // ============================
    public function adminLogin()
    {
        return view('auth.admin-login');
    }

    public function adminLoginSubmit(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        $admin = User::where('email', $request->email)
                     ->where('role', 'admin')
                     ->first();

        if ($admin && Hash::check($request->password, $admin->password)) {
            session(['admin_id' => $admin->id, 'admin_name' => $admin->name]);
            return redirect()->route('admin.dashboard');
        }

        return back()->withErrors(['email' => 'Invalid credentials or not authorized.']);
    }

    // ============================
    // USER LOGIN
    // ============================
    public function userLogin()
    {
        return view('auth.user-login');
    }

    public function userLoginSubmit(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        $user = User::where('email', $request->email)
                    ->where('role', 'customer')
                    ->first();

        if ($user && Hash::check($request->password, $user->password)) {
            session(['user_id' => $user->id, 'user_name' => $user->name]);
            return redirect()->route('user.dashboard');
        }

        return back()->withErrors(['email' => 'Invalid credentials or not authorized.']);
    }

    // ============================
    // USER REGISTRATION
    // ============================
    public function userRegister()
    {
        return view('auth.user-register');
    }

    public function userRegisterSubmit(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ]);

        User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'role'     => 'customer',
        ]);

        return redirect()->route('login.user')->with('success', 'Account created successfully! You can now login.');
    }

    // ============================
    // ADMIN FORGOT PASSWORD
    // ============================
    public function adminForgotPassword()
    {
        return view('auth.admin-forgot-password');
    }

    public function adminForgotPasswordSubmit(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ]);

        return back()->with('success', 'If this admin email exists, a reset link has been sent.');
    }

    // ============================
    // USER FORGOT PASSWORD
    // ============================
    public function userForgotPassword()
    {
        return view('auth.user-forgot-password');
    }

    public function userForgotPasswordSubmit(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ]);

        return back()->with('success', 'If this email exists, a reset link has been sent.');
    }

    // ============================
    // LOGOUT (Admin/User)
    // ============================
    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect()->route('home')->with('success', 'Logged out successfully.');
    }
}
