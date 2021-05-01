<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\post;
use Illuminate\Database\Eloquent;

class PostController extends Controller
{
    function listing(){

        $post= post::where('id',1)->first();
        // $post->users->each(function($post) {
        //     echo $post->name;
        // });
        dd($post);

        $data=post::orderBy('id','desc')->get();

        return view('admin/post/list',['data'=>$data]);
    }

    function view_add(){

        
        
        return view('admin/post/add');
    }

    function add(Request $req){

        $req->validate([
            'image'=>'required | mimes:jpg,jpeg,png,PNG',
            'slug'=>'required | unique:posts'
        ]);

        $post=new post;
        // $data=$req->all();

        $post->title=$req->title;
        // $post->title= $req->input('title');
        $post->slug=$req->slug;
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
        // $post->fill($data)->save();

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

    function update_status($id, $status){
        
        $post= post::find($id);

        $post->status=$status;
        
        $post->save();

        session()->flash('msg','Post Status Updated');
        session()->flash('alert','warning');

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
        $post->slug=$req->slug;
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


    public function store(Request $request)
    { 
        $data=$request->all();

        // $data['topic_id'] = $request->my_topic_id;
        // if ($request->file('image')){
        //     $filename = time().'.'.$request->image->getClientOriginalExtension();
        //     $request->image->move(public_path('uploads/Blog'), $filename);
        //     $data['image'] = "Blog/".$filename;
        // }
       
        $status=post::create($data);
        if($status){
            request()->session()->flash('success','Post Successfully added');
        }
        else{
            request()->session()->flash('error','Please try again!!');
        }
        return redirect()->route('post.index');
    }
}
