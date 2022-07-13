<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Dangtin;
use App\Models\Danhgia;
use App\Models\Loaiphong;
use App\Models\Phuong;
use App\Models\Quan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class DangtinController extends Controller
{

    public function __construct()
    {
        $loaiphong = Loaiphong::all();
        view()->share('loaiphong',$loaiphong);
        $phuong = Phuong::all();
        $quan = Phuong::with('quan')->get();
        $dangtin = Dangtin::all();
        $comment = Comment::all();
        view()->share('comment',$comment);
        view()->share('dangtin',$dangtin);
        view()->share('phuong',$phuong);
        view()->share('quan',$quan);
    }
    public function trangchitiet($id){
        $grate = Danhgia::where('dangtin_id',$id)->avg('grate');
        $grate   = round($grate);
        $dangtin = Dangtin::where('id',$id)->first();
        $user = Auth::user();
         return view('dangtin.trangchitiet',compact('dangtin','grate','user'));
    }
    public function rating(Request $request){
        $model = Danhgia::where($request->only('user_id','dangtin_id'))->first();
        if ($model)
        {
            $model->update($request->only('grate'));

        }else{
            $danhgia = new Danhgia();
            $danhgia->grate = $request->grate;
            $danhgia->user_id = \auth()->user()->id;
            $danhgia->dangtin_id = $request->dangtin_id;
            $danhgia->save();
        }

        return redirect()->back();
    }

    public function index(){
         return view('dangtin.dangtin');
     }
    public function create(Request $request)
    {
            $this->validate($request,[
                'Tieude'=>'required',
                'Diachi'=>'required',
                'loaiphong_id'=>'required',
                'phuong_id'=>'required',
            ],[


            ]);

        if ($request->hasFile('Hinhanh')) {
            $file = $request->file('Hinhanh');
            $destination_path = public_path('upload/dangtin');
            $file_Name = time() . '_' . $file->getClientOriginalName();
            $file->move($destination_path, $file_Name);
        } else {
            $file_Name = 'noname.jpg';

        }
             $newdangtin = new Dangtin();
             $newdangtin->Tieude = $request->Tieude;
             $newdangtin->Diachi = $request->Diachi;
             $newdangtin->loaiphong_id = $request->loaiphong_id;
             $newdangtin->phuong_id = $request->phuong_id;
             $newdangtin->Giaphong = $request->Giaphong;
             $newdangtin->Dientich = $request->Dientich;
             $newdangtin->Sdt = $request->Sdt;
             $newdangtin->soluongphong = $request->soluongphong;
             $newdangtin->soluongphongcontrong = $request->soluongphongcontrong;
             $newdangtin->Mota = $request->Mota;
             $newdangtin->tiennghi = $request->tiennghi;
             $newdangtin->Hinhanh =$file_Name;
             $newdangtin->user_id = \auth()->user()->id;
             $newdangtin->save();
             return redirect()->route('create')->with('thongbao', 'Bài đã đăng bài và đang chờ duyệt');
         }


}
