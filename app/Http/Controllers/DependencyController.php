<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

class DependencyController extends Controller
{
    public function getDzongkhag()
    {
        $dzongkhag = DB::table('dzongkhags')->pluck("name","id");
        return view('dropdown',compact('dzongkhag'));
    }
    public function getGewog($id) 
    {        
        $gewog = DB::table("gewogs")->where("dzongkhag_id",$id)->pluck("name","id");
        return json_encode($gewog);
    }
    
}
