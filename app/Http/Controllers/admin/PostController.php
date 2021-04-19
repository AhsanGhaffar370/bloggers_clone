<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\post;

class PostController extends Controller
{
    function listing(){
        $data=post::orderBy('id','desc')->get();

        return view('admin/post/list',['data'=>$data]);
    }

    function view_add(){
        return view('admin/post/add');
    }

    function add(Request $req){

        $req->validate([
            'image'=>'required | mimes:jpg,jpeg,png,PNG'
        ]);

        $post=new post;

        $post->title=$req->title;
        // $post->title= $req->input('title');
        $post->short_desc=$req->short_desc;
        $post->long_desc=$req->long_desc;
        $post->post_date=$req->post_date;
        $post->status="1";
        $post->added_on=date('Y-m-d');
        
        // $post_img=$req->file('image')->store('public/post_images');
        $post_img=$req->file('image');
        $ext=$post_img->extension();
        $final_img=time().".".$ext;
        $post_img->storeAs('/public/post_images',$final_img);

        $post->image=$final_img;
        
        
        $post->save();

        $req->session()->flash('msg','Post Inserted');
        $req->session()->flash('alert','success');

        return redirect('admin/post/list');
    }

    function delete($id){
        $post=post::find($id);

        $img_name=$post->image;
        $img_path=public_path('storage/post_images/'.$img_name);
        unlink($img_path);

        $post->delete();

        session()->flash('msg','Post Deleted');
        session()->flash('alert','danger');
        return redirect('admin/post/list');

    }

    function edit($id){
        // $post=post::find($id);
        // echo "<pre>";
        // print_r($post);
        // return view('admin/post/update',['data'=>$post]);
        
        return view("admin/post/update")->with("res",post::find($id));
    }

    function update(Request $req){

        $req->validate([
            'image'=>'mimes:jpg,jpeg,png,PNG'
        ]);

        $post= post::find($req->id);

        $post->title=$req->title;
        // $post->title= $req->input('title');
        $post->short_desc=$req->short_desc;
        $post->long_desc=$req->long_desc;
        $post->post_date=$req->post_date;
        $post->status="1";
        $post->added_on=date('Y-m-d');

        if($req->hasfile('image')){

            $img_name=$post->image;
            $img_path=public_path('storage/post_images/'.$img_name);
            unlink($img_path);

            // $post_img=$req->file('image')->store('public/post_images');
            $post_img=$req->file('image');
            $ext=$post_img->extension();
            $final_img=time().".".$ext;
            $post_img->storeAs('/public/post_images',$final_img);
            
            $post->image=$final_img;
        }
       

        $post->save();

        $req->session()->flash('msg','Post Updated');
        $req->session()->flash('alert','warning');
        // $req->save();

        return redirect('admin/post/list');
        // return Student::find($id);
    }

}
