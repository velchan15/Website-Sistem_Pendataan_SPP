<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    public function index()
    {
    	return view('login', [
    		'title' => 'Login'
    	]);
    }

   public function authenticate(Request $request)
    {
    	$credentials = $request->validate([
    		'username' => 'required',
    		'password' => 'required'
    	]);

    	if (Auth::attempt(['username' => $credentials['username'], 'password' => $credentials['password']])) {
            $request->session()->regenerate();
 
           if (Auth::user()->level == 'admin') {
           return redirect()->intended('/admin/dashboard');
            } else if (Auth::user()->level == 'petugas') {
                return redirect()->intended('/petugas/dashboard');
            } else {
                return redirect()->intended('/siswa2/dashboard');
            }
        }
 
        return back()->with('loginError', 'Login failed!');
	}

	public function logout()
	{
    	Auth::logout();

    	request()->session()->invalidate();

    	request()->session()->regenerateToken();

    	return redirect('/login');
	}

}