<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Block;
use Illuminate\Http\Request;

class MapController extends Controller
{

    public function index(){

        $maps=Block::with(['factory'=>function($q){
            $q->with(['category'])->where('status',1)->where('map_status',1);
        }])->get();
        return view('website.map.map',compact(['maps']));
    }

    public function factory(Request $request){

        $factory=Block::with(['factory'=>function($q){
            $q->with(['mobiles','category'])->withCount(['products','services']);
            $q->where('status',1)->where('map_status',1);
        }])->find($request->id);

        if (!$factory){
            return response()->json(['status'=>false]);
        }

        $factory=view('website.map.factory',compact(['factory']))->render();
        return response()->json([
            'status'=>true,
            'modal'=>$factory,
        ]);
    }
}
