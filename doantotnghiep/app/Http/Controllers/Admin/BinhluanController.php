<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Comment;
use Illuminate\Http\Request;

class BinhluanController extends Controller
{
   public function index(){
       $binhluan = Comment::paginate(10);
       return view('admin.binhluan.index',[
           'title'=>'Quản lí bình luận'
       ],compact('binhluan'));
   }
}
