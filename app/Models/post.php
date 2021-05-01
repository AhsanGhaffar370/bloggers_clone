<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class post extends Model
{
    protected $fillable = ['user_id','title','slug'];
    public function user(){
        // dd("hello");
        return $this->belongsTo('App\Models\User');
    }
    use HasFactory;
    public $timestamps=false;

   
}
