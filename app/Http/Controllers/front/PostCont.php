<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\post;

class PostCont extends Controller
{
    function home(){
        
        // $res= DB::table('posts')->orderBy('id','desc')->get();
        // return view('front/home',['data'=>$res]);

        // $data=post::orderBy('id','desc')->get();
        // return view('front/home',['data'=>$data]);

        return view("front/home")->with("data",post::all());
    }

    function single_post($id){
        
        // $res= DB::table('posts')->where('id',$id)->get();
        // return view('front/home',['data'=>$res]);

        // $res=post::find($id);
        // return view("front/post",['data'=>$res]);

        $res=post::find($id);
        return view("front/post")->with("data",$res);
    }
}
