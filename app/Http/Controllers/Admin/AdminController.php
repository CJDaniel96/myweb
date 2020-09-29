<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.admin:admin');
    }

    public function index(Request $request)
    {
        $admin = $request->user();

        return view('admin.admin.dashboard', compact('admin'));
    }

    public function user_management_information()
    {
        return 0;
    }

    public function user_management_users()
    {
        return 0;
    }
}
