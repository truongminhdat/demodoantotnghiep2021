<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dangtin;
use App\Models\Datphong;
use Illuminate\Http\Request;

class DatphongController extends Controller
{
    public function index(){
        $dangtin = Dangtin::with('loaiphong')->get();
        $datphongs = Datphong::with('user', 'dangtin')->paginate(5);
        return view('admin.datphong.index',[
            'title'=>'Danh sách đặt phòng'
        ],compact('datphongs','dangtin'));
    }
    public function destroy($id)
    {
        $datphong = Datphong::find($id);
        $datphong->delete();
        return redirect()->route('admin.datphong')->with('thongbao','Xóa phòng thành công');
    }
}
