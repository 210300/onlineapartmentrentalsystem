<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\dzongkhag;
use App\Models\gewog;
use App\Models\Apartment;
use DB;

class welcomeController extends Controller
{

    public function index(){
        $apartments = Apartment::whereDoesntHave('bookings', function ($query) {
            $query->active();                      
            })->latest()->paginate(6);
    return view('welcome',compact('apartments'));
    }
    // public function getDzongkhag()
    // {
    //     $dzongkhag = DB::table('dzongkhags')->pluck("name","id");
    //     return view('/welcome',compact('dzongkhag',$dzongkhag));
    // }
    // public function getgewog($id) 
    // {        
    //     $gewog = DB::table("gewogs")->where("dzongkhag_id",$id)->pluck("name","id");
    //     return json_encode($gewog);
    // }
    public function search(){
        $gewog=gewog::get('name');
        $apartment=apartment::where('gewog_id','LIKE','%'.$gewog.'%')->orWhere('gewog_id','LIke','%'.$gewog.'%')->get();
        if(count($apartment) > 0){
        return view('/search',compact('apartment',$apartment))->withDetails($apartment)->withQuery($gewog);
        }
        else{
    return view('/search',compact('apartment',$apartment))->withMessage('No Details found.');
        }    

    }
    public function show(Request $request,$id){
        $apartment = apartment::findOrFail($id);
        return view('viewdetails',compact('apartment'));
    }
}
