<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dangtin;
use Illuminate\Http\Request;

class DangtinController extends Controller
{
   public function index(){
       $dangtin = Dangtin::paginate(10);
       return view('admin.dangtin.dangtin',[
           'title'=>'Quản lí Đăng tin'
       ],compact('dangtin'));
   }
   public function duyetbaidang(Request $request){
       $data = $request->all();
       $dangtin = Dangtin::find($data['id']);
       $dangtin->status = $data['status'];
       $dangtin->save();
   }
}
