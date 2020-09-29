<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

class ForgotPasswordController extends Controller
{
    use SendsPasswordResetEmails;

    public function __construct()
    {
        $this->middleware('guest.admin:admin')->except('logout');
    }

    public function showLinkRequestForm()
    {
        return view('admin.auth.forgot-password');
    }

    public function broker()
    {
        return Password::broker('admins');
    }
}
