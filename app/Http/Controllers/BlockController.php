<?php

namespace App\Http\Controllers;

use App\Block;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BlockController extends Controller
{
    public function add(){

        return view('blockadd');
    }
    public function store(Request $request){

        Block::create([
            'name'=>'null',
            'position'=>$request->position
        ]);

        return redirect()->route('add');
    }

    public function map()
    {
        $maps = Block::get();

        return view('puremap',compact(['maps']));
    }

}
