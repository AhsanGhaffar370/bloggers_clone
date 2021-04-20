<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\contact;

class ContactController extends Controller
{
    function listing(){
        $data=contact::orderBy('id','desc')->get();

        return view('admin/contact/list',['data'=>$data]);
    }

}
