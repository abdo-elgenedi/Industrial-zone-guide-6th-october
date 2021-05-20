<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Factory;
use App\Models\FactoryCategory;
use App\Models\Product;
use App\Models\Service;
use Illuminate\Http\Request;

class ShowController extends Controller
{

    public function product(Request $request){

        $product=Product::with(['images','factory'])->find($request->id);
        if (!$product){return abort(404);}
        $modal=view('website.shows.product',compact(['product']))->render();
        return response()->json([
           'modal'=>$modal
        ]);
    }

    public function service(Request $request){

        $service=Service::with(['images','factory'])->find($request->id);
        if (!$service){return abort(404);}
        $modal=view('website.shows.service',compact(['service']))->render();
        return response()->json([
            'modal'=>$modal
        ]);
    }

    public function factory($id){

        $factory=Factory::find($id);
        $products=Product::where('fact_id',$factory->id)->get();
         $categories=FactoryCategory::with(['products','services'])->where('fact_id',$factory->id)->get();
        return view('website.shows.factory',compact(['factory','products','categories']));
    }
}
