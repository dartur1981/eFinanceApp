<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\SysUser;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller{

    public function formLogin(){ 
        
        if(Auth::user()){

            return view('dashboard.index');

        } else{

            return view('login.index');
        } 
    }

    public function Login(Request $request){
        
        $request->validate([

            'login' => 'required',
            'password' => 'required'
        ]);

        $lembrar = empty( $request->lembrar) ? false : true;

        $user = new SysUser();
        $response = $user->where('su_email', $request->login)->first();

        if($response && Hash::check( $request->password, $response->su_password)){

            Auth::loginUsingId($response->su_id, $lembrar);
        }
        
        return redirect()->action( [LoginController::class, 'formLogin']);
    }
    
}
