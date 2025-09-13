<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class EmployeeAuthController extends Controller
{
    // ============================
    // EMPLOYEE LOGIN FORM
    // ============================
    public function showLoginForm()
    {
        return view('auth.employee-login');
    }

    // ============================
    // EMPLOYEE LOGIN SUBMIT
    // ============================
    public function authenticate(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
            'role' => 'required|in:driver,staff',
        ]);

        $user = User::where('email', $request->email)
                    ->where('role', $request->role)
                    ->first();

        if ($user && Hash::check($request->password, $user->password)) {
            session([
                'employee_id' => $user->id,
                'employee_name' => $user->name,
                'employee_role' => $user->role
            ]);

            if ($user->role == 'driver') return redirect()->route('driver.dashboard');
            if ($user->role == 'staff') return redirect()->route('staff.dashboard');
        }

        return back()->withErrors(['email' => 'Invalid credentials or role.']);
    }

    // ============================
    // EMPLOYEE FORGOT PASSWORD
    // ============================
    public function showForgotPassword()
    {
        return view('auth.employee-forgot-password');
    }

    public function sendResetLink(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ]);

        return back()->with('success', 'If this employee email exists, a reset link has been sent.');
    }

    // ============================
    // EMPLOYEE RESET PASSWORD
    // ============================
    public function showResetForm($token)
    {
        return view('auth.employee-reset-password', compact('token'));
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:6|confirmed',
        ]);

        $user = User::where('email', $request->email)->first();
        if ($user) {
            $user->password = Hash::make($request->password);
            $user->save();
            return redirect()->route('login.employee')->with('success', 'Password reset successfully!');
        }

        return back()->withErrors(['email' => 'Invalid email.']);
    }
}
