<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Loaiphong;
use Illuminate\Http\Request;

class LoaiPhongController extends Controller
{
    public function index(){
        $loaiphong = Loaiphong::paginate(10);
        return view('admin.loaiphong.index',[
            'title'=>'Quản Lí Loại Phòng'
        ],compact('loaiphong'));
    }
    public function destroy($id)
    {
        $loaiphong = Loaiphong::find($id);
        $loaiphong->delete();
        return redirect()->route('admin.loaiphong');

    }
}
