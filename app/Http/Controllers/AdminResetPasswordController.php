<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminResetPasswordController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('adminOnly');
        $this->middleware('preventBackHistory');
    }

    public function index(Request $request)
    {
        $request->validate([
            'password' => 'required|confirmed|regex:/^(?=.*[A-Za-z])(?=.*\d)[a-zA-Z\d\w\W]{8,}$/',
            'password_confirmation' => 'required',
        ], [
            'password.required' => 'Password harus diisi',
            'password.confirmed' => 'Password tidak sama',
            'password.regex' => 'Password minimal 8 karakter, harus ada huruf dan angka.',
        ]);
        $user = Auth::user();

        if (Hash::check($request->password, $user->password)) {
            return redirect()->back()->withInput()->withErrors(['password' => 'Password baru sama dengan password lama']);
        }

        if ($request->password != $request->password_confirmation) {
            return redirect()->back()->withInput()->withErrors(['password' => 'Password tidak sama']);
        }

        $input['password'] = Hash::make($request->password);
        $input['aktif'] = 1;

        $user->update($input);
        return redirect()->back()->with('success', 'Password berhasil diupdate');
    }
}
