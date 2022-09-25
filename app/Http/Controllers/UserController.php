<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\SysUser;

class UserController extends Controller
{
    public function index(){ }

    public function show(){ }

    public function create(){ 

        return view('dashboard.user-add');

    }

    public function store(Request $request){ 

        // dd($request);
        $user = new SysUser;
        $user->su_user = "dartur";
        $user->su_name = "Daniel Fonseca";
        $user->su_group = 1;
        $user->su_status = 1;
        $user->su_email = $request->email;
        $user->su_password = bcrypt( $request->password );
        $user->save();

        return redirect()->action( [UserController::class, 'create']);

    }

    public function edit(){ }

    public function update(){ }

    public function delete(){ }
}
