<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
class LoginController extends Controller
{

    use AuthenticatesUsers;
    protected $redirectTo = '/dashboard';
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


  
    public function authenticated(Request $request, $user)
    {
    
        activity($user->name)
            ->performedOn($user)
            ->causedBy($user)
            ->log('LoggedIn');
        if($user->hasRole('admin')){

            // dd('if ma');
            return redirect('dashboard');
        }elseif($user->hasRole('developer'))
        {
            // dd('elseif ma');
            return redirect('dashboard');

          
        }
        else
        {
            // dd('else');
            return redirect('/');
        }
    }

    public function logout(Request $request)
    {
        $user = auth()->user();
        activity($user->name)
            ->performedOn($user)
            ->causedBy($user)
            ->log('LoggedOut');
        $this->guard()->logout();
        $request->session()->invalidate();
        return redirect('/');
    }
}
