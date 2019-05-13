<?php

namespace EpfOrgPl\EpfSso\Http\Auth;

use EpfOrgPl\EpfSso\Http\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showLinkRequestForm()
    {
        return view('epf-sso::auth.passwords.email');
    }

    /**
     * Overridden to add 'is_registered_user' to validation list.
     *
     * @param Request $request
     */
    protected function validateEmail(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email|is_registered_user'
        ]);
    }
}
