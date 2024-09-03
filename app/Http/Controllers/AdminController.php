<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function admin_dashboard()
    {
        return view('admin_dashboard');
    }
    public function logout()
    {
        session()->remove('admin_uname');
        return redirect('login');
    }
}