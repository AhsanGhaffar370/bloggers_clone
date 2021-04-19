<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Admin_auth extends Controller
{
    function login_req(Request $req){
        $email= $req->input('email');
        $password= $req->input('pass');

        $res=DB::table('users')->where('email',$email)->where('password',$password)->get();

        if(isset($res[0])){
            if($res[0]->status==1){
                $req->session()->put('user_id',$res[0]->id);
                $req->session()->put('user_name',$res[0]->name);
                return redirect('admin/post/list');
            }
            else{
                $req->session()->flash('err','email or password is incorrect');
                return redirect('admin/login');
            }

        }else{
            $req->session()->flash('err','email or password is incorrect');
            return redirect('admin/login');
        }
    }
}
