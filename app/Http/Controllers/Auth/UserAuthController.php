<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Auth\Authenticatable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserAuthController extends Controller
{
    //
    use Authenticatable;
    protected $maxAttempts = 3;
    protected $decayMinutes = 2;
   

    public function index(){

        return view('login.login');
    }

    public function loginPost(Request $request)
    {

        // dd($request->email);

        $validatedData = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        $user =  User::where('email', $request->email)->where('active', 1)->first();

        if ( $user != null){


            if(Auth::attempt($validatedData)){
                
                $request->session()->regenerate();
    
                return redirect()->intended('/home');
    
            }
        }

        return back()->with('LoginError', 'Login failed!');
       
    }
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('Success', 'Logout success');
        }

    public function register(){

        return view('register.register');
    }


}
