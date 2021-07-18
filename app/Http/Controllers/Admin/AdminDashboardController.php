<?php

namespace App\Http\Controllers\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Models\gewog;
use App\Models\dzongkhag;
use App\Models\apartment;
use App\Models\owner;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\MailController;
use DB;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;


class AdminDashboardController extends Controller{
  
	  
   
      public function registeredit(Request $request, $id)
      {
      	$users = User::findorfail($id);
      	return view('admin.registeredit')->with('users',$users);
      }
      public function registerupdate(Request $request, $id)
      {
          $users =User::find($id);
          $users->name =$request->input('name');
          $users->usertype =$request->input('usertype');
           $users->phone =$request->input('phone');
           $users->gender =$request->input('gender');
           $users->dzongkhag =$request->input('dzongkhag');
           $users->gewog =$request->input('gewog');
          $users->email =$request->input('email');
          $users->update();
          return redirect('/role-register')->with('status','Data is Updated');
      }
      public function registerdelete(Request $request, $id)
      {
        $users = User::findorfail($id);
        $users->delete();
      return redirect('/role-register')->with('status','Data is deleted');
      }
   
     
      public function store(Request $request)
      {
        $users = new User;
        $users->name =$request->input('name');
        $users->usertype =$request->input('usertype');
        $users->phone =$request->input('phone');
        $users->gender =$request->input('gender');
        $users->dzongkhag =$request->input('dzongkhag');
        $users->gewog =$request->input('gewog');
        $users->email =$request->input('email');
        $users->password =Hash::make('password');
        $users->save();
        return redirect('/role-register')->with('status','Owner have been added');
      }
      public function Gstore(Request $request)
      {
        $gewogs= new Gewog;        
        $gewogs->name =$request->input('name');
        $gewogs->dzongkhag_id=$request->input('dzongkhag_id');
        $gewogs->save();
        return redirect('/admin.gewog')->with('status','Gewog have been added');
      }
      public function Gindex()
      {
        return view('admin.gewog');
       
      }
      public function gewogview()
      {
        $gewogs=gewog::all();
        return view('admin.viewgewog')->with('gewog',$gewogs);
      }
      
      public function gewogedit(Request $request, $id)
      {
      	$gewogs = gewog::findorfail($id);
      	return view('admin.gewogedit')->with('gewog',$gewogs);
      }
      public function gewogupdate(Request $request, $id)
      {
          $gewogs =gewog::findOrFail($id);
          $gewogs->name =$request->input('name');
          $gewogs->update();
          return redirect('/admin.viewgewog')->with('status','Data is Updated');
      }
      public function gewogdelete(Request $request, $id)
      {
        $gewogs = gewog::findorfail($id);
        $gewogs->delete();
      return redirect('/admin.viewgewog')->with('status','Data is deleted');
      }
      public function Dstore(Request $request)
      {
        $dzongkhags=new dzongkhag;
        $dzongkhags->name=$request->input('name');
        $dzongkhags->save();
        return redirect('/admin.dzongkhag')->with('status','Dzongkhag have been added');
       
      }
      public function Dindex()
      {
        return view('admin.dzongkhag');
       
      }
      public function dzongkhagview()
      {
        $dzongkhags=dzongkhag::all();
        return view('admin.viewdzongkhag')->with('dzongkhag',$dzongkhags);
      }
      public function dzongkhagedit(Request $request, $id)
      {
      	$dzongkhags = dzongkhag::findorfail($id);
      	return view('admin.dzongkhagedit')->with('dzongkhag',$dzongkhags);
      } 
      public function dzongkhagupdate(Request $request, $id)
      {
          $dzongkhags =dzongkhag::findOrFail($id);
          $dzongkhags->name =$request->input('name');
          $dzongkhags->update();
          return redirect('/admin.viewdzongkhag')->with('status','Data is Updated');
      }
      public function dzongkhagdelete(Request $request, $id)
      {
        $dzongkhags = dzongkhag::findorfail($id);
        $dzongkhags->delete();
      return redirect('/admin.viewdzongkhag')->with('status','Data is deleted');
      }
      public function ownerdelete(Request $request, $id)
      {
        $owner = owner::findorfail($id);
        $owner->delete();
      return redirect('admin.viewowner')->with('status','Data is deleted');
      }
      public function ownerregistered()
    {
      // $users = DB::table('users')->where('usertype'=="tenant")->get();
    	$owner=owner::paginate(2);
    	return view('admin.viewowner')->with('owner',$owner);
    }
    public function owneredit(Request $request, $id)
      {
      	$owner = owner::findorfail($id);
      	return view('admin.owneredit')->with('owner',$owner);
      }
      public function adminviewa()
    {
      // $users = DB::table('users')->where('usertype'=="tenant")->get();
    	$apartment=apartment::paginate(2);
    	return view('admin.adminviewa')->with('apartment',$apartment);
    }
    public function adminviewdelete(Request $request, $id)
    {
        DB::delete('delete from apartments where id = ?',[$id]);
        return redirect('admin.adminviewa')->with('message','data deleted successfully');
    }

}
