<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Dangtin;
use App\Models\Danhgia;
use App\Models\Datphong;
use App\Models\Like;
use App\Models\Loaiphong;
use App\Models\Phuong;
use App\Models\Quan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use function Symfony\Component\String\u;

class DangtinController extends Controller
{

    public function __construct()
    {
        $loaiphong = Loaiphong::all();
        view()->share('loaiphong',$loaiphong);
        $dangtin = Dangtin::with('loaiphong')->get();
        $phuong = Dangtin::with('phuong')->get();
        $user = Dangtin::with('user')->get();
        $quan = Phuong::with('quan')->get();
        $loaiphong = Loaiphong::all();
        $loaiquan = Quan::all();
        $dangtin = Dangtin::all();
        view()->share('loaiquan', $loaiquan);
        view()->share('quan', $quan);
        view()->share('phuong', $phuong);
        view()->share('dangtin', $dangtin);
        view()->share('user', $user);
        view()->share('loaiphong', $loaiphong);
    }
    public function trangchitiet($id)
    {
        $grate = Danhgia::where('dangtin_id',$id)->avg('grate');
        $grate   = round($grate);
        $grate_count = Comment::where('dangtin_id',$id)->count('id');
        $dangtin = Dangtin::where('id',$id)->first();
        $likes = Like::where('dangtin_id',$dangtin->id)->count();
        $user = Auth::user();
        $datphong = Datphong::where('dangtin_id',$id)->orderBy('created_at','DESC')->get();
        $tongsoluong = $dangtin->soluongphong;
        $soluongdangky = Datphong::where('dangtin_id', $id)->count();
        $soluongdaduyet = Datphong::where('dangtin_id', $id)->where('status', 1)->count();
        $soluongphongcontrong = $tongsoluong - $soluongdaduyet;
//        $quan = Dangtin::where('id',$dangtin->quan_id)->get();
        $tin_lienquan = Dangtin::with('quan')
            ->join('quans','quans.id','=','dangtins.quan_id')
            ->where('quans.id',$dangtin->quan_id)
            ->where('dangtins.status','=',1)
            ->orderBy('quan_id','ASC')
//            ->where()
            ->limit(5)
            ->get();
        return view('dangtin.trangchitiet',compact('grate_count','dangtin','grate','user', 'datphong','likes',
        'tongsoluong', 'soluongdaduyet', 'soluongphongcontrong', 'soluongdangky','tin_lienquan'));
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
//        $phuong = Phuong::where('quan_id',0)->get();
        $dangtin = Dangtin::where('status',1)->get();
        $quan = DB::table('quans')->orderBy('Tenquan','ASC')->get();
        return view('dangtin.dangtin',compact('quan','dangtin'));
     }
     public function sapxep(Request $request){
        $quan_id = $request->quan;
        if ($quan_id){
            $phuong = DB::table('phuongs')->where('quan_id',$quan_id)->get();
            return response(['data'=>$phuong]);
        }
     }
    public function create(Request $request)
    {
        $this->validate($request, [
            'Tieude' => 'required',
            'Diachi' => 'required',
            'loaiphong_id' => 'required',
            'phuong_id' => 'required',
            'soluongphong' => 'required|min:1|max:100',
            'Mota' => 'required',
        ], [
            'Tieude.required' => 'B???n ch??a nh???p ti??u ????? b??i vi???t',
            'Diachi.required' => 'B???n ch??a nh???p ?????a ch???',
            'soluongphong.min' => 'S??? l?????ng ph??ng ph???i l???n h??n 0',
            'Mota.required' => 'B???n ch??a nh???p m?? t???',


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
        $newdangtin->quan_id = $request->quan_id;
        $newdangtin->phuong_id = $request->phuong_id;
        $newdangtin->Giaphong = str_replace(',', '', $request->Giaphong);
        $newdangtin->Dientich = $request->Dientich;
        $newdangtin->Sdt = $request->Sdt;
        $newdangtin->soluongphong = $request->soluongphong;
        $newdangtin->soluongphongcontrong = $request->soluongphong;
        $newdangtin->Mota = $request->Mota;
        $newdangtin->tiennghi = $request->tiennghi;
        $newdangtin->Hinhanh = $file_Name;
        $newdangtin->user_id = \auth()->user()->id;
        $newdangtin->save();
        return redirect()->route('create')->with('thongbao', 'B??i ???? ????ng b??i v?? ??ang ch??? duy???t');
    }
    public function getupdatenguoidung($id){
        $dangtin = Dangtin::where('id',$id)->first();
        return view('dangtin.trangcapnhat',compact('dangtin',));
    }
    public function updatedangtin(Request $request,$id){
        $updatedangtin = Dangtin::find($id);
        $updatedangtin->Tieude = $request->input('Tieude');
        $updatedangtin->Diachi = $request->input('Diachi');
        $updatedangtin->loaiphong_id = $request->input('loaiphong_id');
        $updatedangtin->Giaphong = str_replace(',', '',$request->input('Giaphong'));
        $updatedangtin->Dientich = $request->input('Dientich');
        $updatedangtin->Sdt = $request->input('Sdt');
        $updatedangtin->soluongphong = $request->input('soluongphong');
        $updatedangtin->soluongphongcontrong = $request->input('soluongphong');
        $updatedangtin->Mota = $request->input('Mota');
        $updatedangtin->tiennghi = $request->input('tiennghi');
        $updatedangtin->user_id = \auth()->user()->id;
        if($request->hasFile('Hinhanh')){
                $destination = public_path('upload/dangtin').$updatedangtin->Hinhanh;
                if (\Illuminate\Support\Facades\File::exists($destination)){
                    \Illuminate\Support\Facades\File::delete($destination);
                }
                $file = $request->file('Hinhanh');
                $destination_path = public_path('upload/dangtin');
                $file_Name = time().'_'.$file->getClientOriginalName();
                $file->move($destination_path,$file_Name);
                $updatedangtin->Hinhanh = $file_Name;
            }
            $updatedangtin->update();
            return redirect()->back()->with('thongbao','B???n ???? c???p nh???t th??nh c??ng');
    }
    public function searchDangtin(Request $request)
    {
        $quan = DB::table('quans')->get();
        $loaitin = DB::table('loaiphongs')->get();
        $dangtin = DB::table('dangtins')->get();
        if ($request->quan) {
            $result = Dangtin::where('quan_id', 'LIKE', '%' . $request->quan . '%')->get();
            if ($request->loaiphong_id) {
                $result = Dangtin::where('loaiphong_id', 'LIKE', '%' . $request->loaiphong_id);
            }

            return view('dangtin.dangtin', compact('quan', 'dangtin', 'result'));

        }
    }

    public function bookRoom(Request $request)
    {
        DB::beginTransaction();
        try {
            if (Auth::user()){
                $userId = Auth::user()->id;
                if (Auth::user()->role_id == 2) {
                    $id = !empty($request['p']) ? $request['p'] : null;
                    if ($id) {
                        $data = Dangtin::find($id);
                        $checkDatPhong = Datphong::where('user_id', $userId)->where('dangtin_id', $id)->exists();

                        if ($checkDatPhong) {
                            Session()->flash('error', 'B???n ???? ?????t ph??ng n??y r???i !');
                            return back();
                        }

                        if (!empty($data)) {
                            Datphong::create([
                                'user_id' => $userId,
                                'dangtin_id' => $id,
                            ]);
                            DB::commit();

                            return redirect('danhsachphongdat');
                        }
                        Session()->flash('error', 'Ph??ng kh??ng t???n t???i !');
                        return back();
                    }
                    abort(404);
                }
                Session()->flash('error', 'B???n kh??ng th??? ?????t ph??ng !');
                return back();
            }

            Session::push('url_previous', url()->previous());

            return redirect()->route('show-login');
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e);
            abort(500);
        }
    }

    public function huyDatPhong(Request $request)
    {
        DB::beginTransaction();
        try {
            $id = $request->has('dangtin_id') ? $request->dangtin_id : null;
            $user = Auth::user();

            if ($user && $id) {
                Datphong::where('user_id', $user->id)->where('dangtin_id', $id)->delete();
                DB::commit();

                return back();
            }
            Session()->flash('error', '???? s???y ra l???i, vui l??ng th??? l???i !');
            return back();
        }catch (\Exception $e) {
            DB::rollBack();
            abort(500);
        }
    }

    public function danhSachPhongDat(Request $request)
    {
        if (Auth::user()) {
            $user = Auth::user();
            $user_id = $user->id;
            $dangtin = Dangtin::with('loaiphong')->get();
            $datphongs = Datphong::with('user', 'dangtin')->where('user_id', $user_id)->get();

            return view('danhsachphongdat.index', compact('datphongs', 'dangtin'));
        }

        return redirect()->route('show-login');
    }
    public function UserDangtin(){
        $dangtin = Dangtin::with('datphong')->where('user_id',Auth::user()->id)->paginate(5);
        return view('dangtin.danhsachdangtoi',compact('dangtin'));
    }
    public function select_delivery(Request $request){
        $data = $request->all();
        if ($data['action']){
            if($data['action']== "quan"){
                $select_phuong = Phuong::where('quan_id',$data['id'])->orderby('TenPhuong','ASC')->get();
                    $output ='<option>--Ch???n ph?????ng--</option>';
                foreach ($select_phuong as $key => $phuong){
                    $output ='<option value="'.$phuong->id.'">'.$phuong->TenPhuong.'</option>';
                }

            }
        }
        echo $output;
    }

    public function getWards($id){
        $wards = Phuong::where('quan_id', $id) -> get();

        return $wards;
    }
    public function destroy($id){
        $dangtin = Dangtin::find($id);
        $dangtin->comment()->delete();
        $dangtin->danhgia()->delete();
        $dangtin->like()->delete();
        $dangtin->delete();

        return redirect()->route('dangtin.baidangcuatoi');
    }
    public function duyetbaidang($id){
        $datphong = Datphong::where('id',$id)->first();
        $dangtin_id = $datphong->dangtin_id;
        $dangtin = Dangtin::where('id', $dangtin_id)->first();
        $soluongphongcontrong = $dangtin->soluongphongcontrong;
        if ($soluongphongcontrong == 0){
            Session()->flash('error', 'Ph??ng ???? ?????y !');
            return redirect()->back();
        }
        else{
            $datphong->update([
                'status' => 1
            ]);
            $soluongphongcontrong= $dangtin->soluongphongcontrong;
            $dangtin->update(['soluongphongcontrong' => $soluongphongcontrong - 1]);
            Session()->flash('success', 'Duy???t th??nh c??ng !');
            return redirect()->back();
        }
    }
    public function xoadanhsach($id){
        $datphong = Datphong::where('id',$id)->first();
        $dangtin_id = $datphong->dangtin_id;
        $dangtin = Dangtin::where('id', $dangtin_id)->first();
        $datphong->delete();
        $soluongphongcontrong= $dangtin->soluongphongcontrong;
        $dangtin->update(['soluongphongcontrong' => $soluongphongcontrong + 1]);
        Session()->flash('success', 'X??a th??nh c??ng !');
        return redirect()->back();

    }

    public function guimailthongbao(Request $request)
    {
        // $request->validate([
        //     'email' => 'required|email|exists:users',
        // ]);
        // dd($request->all());
        $dangtin = Dangtin::findOrfail($request->id_tin);
        // dd($dangtin);

        $diachi = $dangtin->Diachi;
        $chutro = $dangtin->user->name;
        $ten = $dangtin->Tieude;
        // dd($data);
        $token = Str::random(64);
        $data = [
            'diachi' => $diachi,
            'token' => $token,
            'ten' => $ten,
        ];
        $to_email = $request->email;
        Mail::send('mail.thongbao', $data, function ($message) use ($to_email) {
            $message->to($to_email)->subject("Ph??ng tr??? ???? n???ng");
            $message->from($to_email, "Th??ng b??o ph??ng tr???");
        });

        return back()->with('message', 'Vui l??ng ki???m tra mail c???a b???n');
    }
    public function tinlienquan($id){
        $dangtin =  Dangtin::where('loaiphong_id',$id)->get();
        return view('dangtin.tinlienquan',compact('dangtin',));
    }
 }
