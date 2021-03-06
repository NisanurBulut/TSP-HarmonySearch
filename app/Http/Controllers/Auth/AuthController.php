<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function __construct()
    {
        // $this->middleware('guest');
    }
    public function index()
    {
        return View('auth.login');
    }

    public function storeLogin(Request $request)
    {
        $this->validate($request, [
            'username'=>'required',
            'password'=>'required',
        ]);

        if(!auth()->attempt($request->only('username','password')))
        {
            return back()->with('status','Kimlik doğrulanamadı.');
        };
        return redirect()->route('demands.index');
    }

       public function storeLogout(){

        auth()->logout();
        return redirect()->route('auth.login');
       }
}