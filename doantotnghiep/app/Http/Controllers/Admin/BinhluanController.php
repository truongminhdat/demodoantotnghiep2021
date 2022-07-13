<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Dangtin;
use Illuminate\Http\Request;

class BinhluanController extends Controller
{
    public function index(){
        $dangtin = Dangtin::with('loaiphong')->get();
        $comment = Comment::with('user', 'dangtin')->paginate(10);
        return view('admin.binhluan.index',[
            'title'=>'Danh sách bình luận'
        ],compact('comment','dangtin'));
    }
    public function xoabinhluan($id){
        $comment = Comment::find($id);
        $comment->delete();
        return redirect()->route('admin.binhluan')->with('thongbao','Xóa thành công');
    }
}
