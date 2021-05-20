<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Factory;
use App\Models\Product;
use App\Models\Service;
use Illuminate\Http\Request;

class SearchController extends Controller
{

    public function allSearch(){
        $search=\request()->search;
        $factories=Factory::where('name','like','%'.$search.'%')->with(['category','mobiles'])->limit(5)->get();
        $products=Product::where('name','LIKE','%'.$search.'%')->with(['factory','category'])->limit(5)->get();
        $services=Service::where('name','LIKE','%'.$search.'%')->with(['factory','category'])->limit(5)->get();

        return view('website.search.allsearch',compact(['factories','products','services','search']));
    }

    public function allFactories(){


        $search=\request()->search;
        $categories=Category::get();
        if (isset(request()->cat_id)&&\request()->cat_id!=0){
            $factories=Factory::where('name','like','%'.$search.'%')->where('cat_id',\request()->cat_id)->orderBy('name',\request()->order??'ASC')->with(['category','mobiles'])->paginate(10);
        }else {
            $factories = Factory::where('name', 'like', '%' . $search . '%')->orderBy('name', \request()->order ?? 'ASC')->with(['category', 'mobiles'])->paginate(10);
        }
        return view('website.search.allfactories',compact(['factories','search','categories']));

    }

    public function allProducts(){


        $search=\request()->search;
        $factories=Factory::get();
        if (isset(request()->fact_id)&&\request()->fact_id!=0){
            $products=Product::where('name','like','%'.$search.'%')->where('fact_id',\request()->fact_id)->orderBy('name',\request()->order??'ASC')->with(['factory'])->paginate(10);
        }else {
            $products=Product::where('name','like','%'.$search.'%')->orderBy('name',\request()->order??'ASC')->with(['factory'])->paginate(10);
        }
        return view('website.search.allproducts',compact(['products','search','factories']));

    }

    public function allServices(){


        $search=\request()->search;
        $factories=Factory::get();
        if (isset(request()->fact_id)&&\request()->fact_id!=0){
            $services=Service::where('name','like','%'.$search.'%')->where('fact_id',\request()->fact_id)->orderBy('name',\request()->order??'ASC')->with(['factory'])->paginate(10);
        }else {
            $services=Service::where('name','like','%'.$search.'%')->orderBy('name',\request()->order??'ASC')->with(['factory'])->paginate(10);
        }
        return view('website.search.allservices',compact(['services','search','factories']));

    }

}
