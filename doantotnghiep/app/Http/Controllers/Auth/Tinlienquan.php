<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Dangtin;
use App\Models\Loaiphong;
use Illuminate\Http\Request;

class Tinlienquan extends Controller
{
    public function index(){
        $loaiphong = Loaiphong::all();
        $dangtinlienquan = Dangtin::where('loaiphong_id',$loaiphong)->get();
        return view('dangtin.tinlienquan',$dangtinlienquan);
    }
}
