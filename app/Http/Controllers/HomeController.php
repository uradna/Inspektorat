<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('preventBackHistory');
    }
    public function index()
    {
        // dd(Auth::user()->level);
        switch (Auth::user()->level) {
            case "0":
                if (Auth::user()->name == null) {
                    return redirect()->route('user.account');
                }
                return redirect()->route('user.dashboard');
                break;
            case "1":
                return redirect()->route('admin.dashboard');
                break;
            case "2":
                return redirect()->route('superadmin.dashboard');
                break;
            default:

        }
    }
}
