<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\page;

class PageController extends Controller
{
    function listing(){
        $data=page::orderBy('id','desc')->get();

        return view('admin/page/list',['data'=>$data]);
    }

    function view_add(){
        return view('admin/page/add');
    }

    function add(Request $req){

        $req->validate([
            'slug'=>'required | unique:pages'
        ]);
        $page=new page;

        $page->name=$req->name;
        $page->slug=$req->slug;
        $page->description=$req->description;
        $page->status="1";
        $page->added_on=date('Y-m-d');
        
        $page->save();

        $req->session()->flash('msg','Page Inserted');
        $req->session()->flash('alert','success');

        return redirect('admin/page/list');
    }

    function delete($id){
        $page=page::find($id);

        $page->delete();

        session()->flash('msg','page Deleted');
        session()->flash('alert','danger');
        return redirect('admin/page/list');

    }

    function update_status_ajax(Request $req, $id){
        $page= page::find($req->id);

        $page->status=$req->status;

        $page->save();

        echo $req->status;

    }

    function edit($id){
        // $page=page::find($id);
        // return view('admin/page/update',['data'=>$page]);
        
        return view("admin/page/update")->with("res",page::find($id));
    }

    function update(Request $req){

        $page= page::find($req->id);

        $page->name=$req->name;
        $page->slug=$req->slug;
        $page->description=$req->description;
        $page->status="1";
        $page->added_on=date('Y-m-d');

        $page->save();

        $req->session()->flash('msg','page Updated');
        $req->session()->flash('alert','warning');

        return redirect('admin/page/list');
    }
}
