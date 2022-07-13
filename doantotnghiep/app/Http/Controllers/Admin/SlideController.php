<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Quan;
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
        $data = $request->all();
        $get_image = $request->Hinh;
        if($request->hasFile('Hinh')) {
            $get_name_image =  $get_image>getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
            $get_image->move(base_path() . '/public/upload/slide', $new_image);
            $data['Hinh'] = $new_image;
        }
        slide::create($data);
//        $slide = new slide();
//        $slide->Hinh = $file_Name;
//        $slide->Noidung = $request->Noidung;
//        $slide->save();
        return redirect()->route('admin.slide')->with('success','Bạn đã thêm thành công');

    }
    public function edit(slide $slide)
    {
        return view('admin.slide.edit',[
            'title'=>'Chỉnh sửa slide' ,
         ],compact('slide'));

    }
    public function update(Request $request,$id){
        $updateslide = slide::find($id);
        $updateslide->Hinh = $request->input('Hinh');
        $updateslide->Noidung = $request->input('Noidung');
        if($request->hasFile('Hinh')){
            $destination = public_path('/upload/slide').$updateslide->Hinh;
            if (\Illuminate\Support\Facades\File::exists($destination)){
                \Illuminate\Support\Facades\File::delete($destination);
            }
            $file = $request->file('Hinh');
            $destination_path = public_path('/upload/slide');
            $file_Name_anhdaidien = time().'_'.$file->getClientOriginalName();
            $file->move($destination_path,$file_Name_anhdaidien);
            $updateslide->Hinh = $file_Name_anhdaidien;
        }

        $updateslide->update();
        return redirect()->back()->with('success','Bạn đã cập nhật thành công');
    }
}
