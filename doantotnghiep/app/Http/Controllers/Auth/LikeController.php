<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Like;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function like($dangtin_id){
        $like = Like::where('dangtin_id',$dangtin_id)->where('user_id',auth()->user()->id)->first();
        if($like){
            $like->delete();
            return back();
        }
        else {
            Like::create([
                'dangtin_id'=>$dangtin_id,
                'user_id'=>auth()->user()->id,
            ]);
            return back();
        }
    }
}
