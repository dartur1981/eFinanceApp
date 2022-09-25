<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\SysUser;

class UserController extends Controller
{
    public function index(){ }

    public function show(){ }

    public function create(){
        
        $users = SysUser::All();    
        return view('dashboard.user-add', compact('users'));    

    }

    public function store(Request $request){ 
        
        $user = new SysUser;
        
        if($request->id){

            $user::Find($request->id);
            $user->su_user = $request->user;
            $user->su_name = $request->name;
            $user->su_group = $request->group;
            $user->su_status = 1;
            $user->su_email = $request->email;
            $user->update();
        } else{

            $user->su_user = $request->user;
            $user->su_name = $request->name;
            $user->su_group = $request->group;
            $user->su_status = 1;
            $user->su_email = $request->email;
            $user->su_password = bcrypt( $request->password );
            $user->save();
        }     
        
        return redirect()->action( [UserController::class, 'create']);

    }

    public function edit($id){ 

        $user  = SysUser::Find($id);
        $users = SysUser::All();        

        if($user) {

            return view('dashboard.user-add', compact('users', 'user'));
        }
            
    }

    public function update(){ }

    public function delete($id){ 

        $user  = SysUser::Find($id);
        $user->delete();

        return redirect()->action( [UserController::class, 'create']);

    }
}
