<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\slide;
use App\Models\User;
use Illuminate\Http\Request;

class SlideController extends Controller
{
    public function __construct()
    {
        $slide = slide::all();
        view()->share('slide',$slide);
    }

    public function index(){
          return view('admin.slide.index',[
              'title'=>'Quản lý slide'
          ]);

    }
    public function create()
    {
        return view('admin.slide.create', [
            'title' => 'Thêm slide',

        ]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'Noidung'=>'required|min:6'
        ]);
        if ($request->hasFile('Hinh')) {
            $file = $request->file('Hinh');
            $destination_path = public_path('/public/upload/slide');
            $file_Name = time(). '_' .$file->getClientOriginalName();
            $file->move($destination_path, $file_Name);
        } else {
            $file_Name = 'noname.jpg';

        }
        $slide = new slide();
        $slide->Hinh = $file_Name;
        $slide->Noidung = $request->Noidung;
        $slide->save();
        return redirect()->route('admin.slide')->with('success','Bạn đã thêm thành công');

    }
}
