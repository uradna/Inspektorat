<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserAccountController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('userOnly');
        $this->middleware('preventBackHistory');
    }

    public function index()
    {
        return view('user.account');
    }
    
    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|numeric',
            'jabatan' => 'required',
            'pangkat' => 'required',
            'pd' => 'required|exists:App\Models\PerangkatDaerah,nama',
            'satker' => 'required'
        ]);
        $input = $request->all();
        $user=Auth::user();
        $user->update($input);
        // session()->flash('message', 'Post successfully updated.');
        return redirect()->back()->with('success', 'Data akun berhasil diupdate');
    }

    public function password(Request $request)
    {
        $user=Auth::user();
        
        if (Hash::check($request->old_password, $user->password)) {
            if ($request->password == $request->confirmation_password) {
                $input['password'] = Hash::make($request->password);
            } else {
                return redirect()->back()->with('fail', 'Update password gagal. Password baru tidak sama.');
            }
        } else {
            return redirect()->back()->with('fail', 'Update password gagal. Password salah.');
        }

        $user->update($input);
        session()->flash('tab', 'p');
        return redirect()->back()->with('success', 'Password berhasil diupdate');
    }
}
