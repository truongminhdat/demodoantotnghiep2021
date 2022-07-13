<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $user = User::paginate(10);
        return view('admin.users.taikhoannguoidung',[
            'title'=>'Quản Lí Tài Khoản'
        ],compact('user'));
    }
    public function duyettaikhoan(Request $request){
        $data = $request->all();
        $user = User::find($data['id']);
        $user->status = $data['status'];
        $user->save();
    }
}
