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

        $data=post::orderBy('id','desc')->get();
        return view('front/home',['data'=>$data]);

        // return view("front/home")->with("data",post::all());
    }

    function single_post($slug){
        
        $res= DB::table('posts')->where('slug',$slug)->get();
        // return view('front/home',['data'=>$res]);

        // $res=post::find($id);
        // return view("front/post",['data'=>$res]);

        // $res=post::find($slug);

        // echo "<pre>";
        // print_r($res[0]);
        return view("front/post")->with("data",$res[0]);
    }

    public static function pages_menu(){
        
        $res= DB::table('pages')->where('status',"1")->get();
        return $res;

    }

    function page($slug){
        
        $res= DB::table('pages')->where('slug',$slug)->get();
        
        // echo "<pre>";
        // print_r($res[0]);
        return view("front/page")->with("data",$res[0]);
        // return view('front/page',['data'=>$res]);

    }
}
