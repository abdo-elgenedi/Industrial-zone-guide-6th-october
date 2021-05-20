<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Factory;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{

    public function index(){

        return view('website.index');
    }

    public function contact(Request $request){

        try{
            Contact::create([
                'name'=>$request->name,
                'email'=>$request->email,
                'subject'=>$request->subject,
                'message'=>$request->message,
            ]);
            return 'OK';

        }catch (\Exception $e){
            return response()->json([],500);
        }
    }
}
