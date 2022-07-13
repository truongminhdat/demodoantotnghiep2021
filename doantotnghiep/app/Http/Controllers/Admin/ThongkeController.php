<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Dangtin;
use App\Models\Datphong;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ThongkeController extends Controller
{
    public function __construct()
    {
//        $dangtin = Dangtin::all();
//        view()->share('dangtin',$dangtin);
    }


    public function thongkebieudo(Request $request){

        DB::statement("SET SQL_MODE=''");
        //Thống kê số lượng phòng được duyệt và đăng ký của mỗi bài đăng
        $total = Datphong::select(
            'dangtins.Tieude',
            DB::raw('COUNT(datphongs.dangtin_id) as total_apply, SUM(datphongs.status = 1) as total_accept')
        )->join('dangtins', 'dangtins.id', 'datphongs.dangtin_id')->groupBy('datphongs.dangtin_id')->get();
        $data_total = "";
        foreach($total as $val) {
            $data_total.="['".$val->Tieude."', ".$val->total_apply.",  ".$val->total_accept.",],";
        }
        $chartDataTotal = $data_total;

        //Thống kế top chủ trọ đăng tin
        $danhsach = DangTin::select(
            'users.name',
            DB::raw('COUNT(dangtins.user_id) AS total_amount')
        )
            ->join('users', 'users.id', 'dangtins.user_id')
            ->groupBy('dangtins.user_id')
            ->limit(3)
            ->get();
        $data = "";
        foreach($danhsach as $val) {
            $data.="['".$val->name."', ".$val->total_amount."],";
        }
        $chartData = $data;
        $topN = $request->input('topn');


        $user = User::select(DB::raw("COUNT(*) as count"))
            ->whereYear('created_at',date('Y'))
            ->groupBy(DB::raw("Month(created_at)"))->pluck('count');
        $months = User::select(DB::raw("Month(created_at) as month"))
            ->whereYear('created_at',date('Y'))
            ->groupBy(DB::raw("Month(created_at)"))
            ->pluck("month");
        $data =  [0,0,0,0,0,0,0,0,0,0,0,0];
        foreach ($months as $index =>$month){
            --$month;
            $data[$month] = $user[$index];
        }
        $user_count = User::count();
        $product_count = Dangtin::where('status',1)->count();
        $comment_count = Comment::count();
        $dangtin = Dangtin::where('status',1)->get();
        $user = User::all();
        $datphong = Datphong::where('status',1)->count();
        if (request()->date_from && request()->date_to){
            $dangtin = Dangtin::where('status',1)->whereBetween('created_at',[request()->date_from,request()->date_to])->get();
        }
        return view('admin.thongke.thongkebieudo',[
            'title'=>'Thống kê danh sách trong admin'
        ],compact('data','user','user_count','dangtin','comment_count','product_count','datphong', 'danhsach',
        'chartData','topN', 'data_total', 'chartDataTotal'));
    }
    public function bieudo(Request $request){
        DB::statement("SET SQL_MODE=''");
        $topN = $request->input('topn');
        if($topN == 1) {
            $danhsach = DangTin::select(
                'users.name',
                DB::raw('COUNT(dangtins.user_id) AS total_amount')
            )
                ->join('users', 'users.id', 'dangtins.user_id')
                ->groupBy('dangtins.user_id')
                ->limit(3)
                ->get();
        }elseif($topN == 2){
            $danhsach = DangTin::select(
                'users.name',
                DB::raw('COUNT(dangtins.user_id) AS total_amount')
            )
                ->join('users', 'users.id', 'dangtins.user_id')
                ->groupBy('dangtins.user_id')
                ->limit(5)
                ->get();
        }else{
            $danhsach = DangTin::select(
                'users.name',
                DB::raw('COUNT(dangtins.user_id) AS total_amount')
            )
                ->join('users', 'users.id', 'dangtins.user_id')
                ->groupBy('dangtins.user_id')
                ->take(10)
                ->get();
        }
        $data = "";
        foreach($danhsach as $val) {
            $data.="['".$val->name."', ".$val->total_amount."],";
        }
        $chartData = $data;

        $total = Datphong::select(
            'dangtins.Tieude',
            DB::raw('COUNT(datphongs.dangtin_id) as total_apply, SUM(datphongs.status = 1) as total_accept')
        )->join('dangtins', 'dangtins.id', 'datphongs.dangtin_id')->groupBy('datphongs.dangtin_id')->get();
        $data_total = "";
        foreach($total as $val) {
            $data_total.="['".$val->Tieude."', ".$val->total_apply.",  ".$val->total_accept.",],";
        }
        $chartDataTotal = $data_total;

        $user = User::select(DB::raw("COUNT(*) as count"))
            ->whereYear('created_at',date('Y'))
            ->groupBy(DB::raw("Month(created_at)"))->pluck('count');
        $months = User::select(DB::raw("Month(created_at) as month"))
            ->whereYear('created_at',date('Y'))
            ->groupBy(DB::raw("Month(created_at)"))
            ->pluck("month");
        $data =  [0,0,0,0,0,0,0,0,0,0,0,0];
        foreach ($months as $index =>$month){
            --$month;
            $data[$month] = $user[$index];
        }
        $user_count = User::count();
        $product_count = Dangtin::where('status',1)->count();
        $comment_count = Comment::count();
        $dangtin = Dangtin::where('status',1)->get();
        $user = User::all();
        $datphong = Datphong::count();
        if (request()->date_from && request()->date_to){
            $dangtin = Dangtin::where('status',1)->whereBetween('created_at',[request()->date_from,request()->date_to])->get();
        }
        return view('admin.thongke.thongkebieudo',[
            'title'=>'Thống kê danh sách trong admin'
        ],compact('data','user','user_count','dangtin','comment_count','product_count','datphong', 'danhsach',
            'chartData','topN', 'total', 'chartDataTotal'));
    }


}
