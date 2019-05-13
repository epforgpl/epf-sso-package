<?php

namespace EpfOrgPl\EpfSso\Http\Auth;

use EpfOrgPl\EpfSso\Http\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

/**
 * Controller for changing user password.
 *
 * @package App\Http\Controllers\Auth
 */
class ChangePasswordController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function changePassword(Request $request)
    {
        $this->validate($request, [
            'current-password' => 'required|matches_current_password',
            'new-password' => 'required|string|min:6|different:current-password|confirmed',
        ]);

        $user = Auth::user();
        $user->password = Hash::make($request->get('new-password'));
        $user->hash_type = 'BCRYPT'; // In case they used to have SHA1.
        $user->save();

        return redirect()->to('/password/change-success');
    }
}
