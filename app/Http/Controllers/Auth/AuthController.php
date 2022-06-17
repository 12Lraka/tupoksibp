<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Hash;
use Session;
use App\Models\User;


class AuthController extends Controller
{
    public function login() {
       
        if (Auth::check()) { // true sekalian session field di users nanti bisa dipanggil via Auth
            //Login Success
            return redirect()->route('dashboard.index');
        }
        return view('login.login');
    }

    public function postlogin(Request $request) {
        //dd($request->all());
        $rules = [
            'email'                 => 'required|email',
            'password'              => 'required|string'
        ];//

        $messages = [
            'email.required'        => 'Email wajib diisi',
            'email.email'           => 'Email tidak valid',
            'password.required'     => 'Password wajib diisi',
            'password.string'       => 'Password harus berupa string'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
 
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }

        $data = [
            'email'     => $request->input('email'),
            'password'  => $request->input('password'),
        ];

        Auth::attempt($data);
 
        if (Auth::check()) { // true sekalian session field di users nanti bisa dipanggil via Auth
            //Login Success
            return redirect()->intended('/dashboard');
        }   else { // false
 
            //Login Fail
            Session::flash('error', 'Email atau Password Salah');
            return redirect()->route('login');
        }
    }
   
    public function logout() {
        Auth::logout();
        return redirect('/tby');
    }
}
