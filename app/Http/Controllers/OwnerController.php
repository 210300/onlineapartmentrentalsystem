<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\owner;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\MailController;
use Illuminate\Support\Facades\Validator;
use DB;

class OwnerController extends Controller
{
    public function ownerindex(){
        return view('admin.addowner');
    }
    
    public function register(Request $request)
    {
        
        $owner = new owner();
        $owner->name = $request->name;
        $owner->email = $request->email;
        $owner->usertype =$request->usertype;
        $owner->gewog =$request->gewog;
        $owner->dzongkhag =$request->dzongkhag;
        $owner->gender =$request->gender;
        $owner->phone =$request->phone;
        $owner->password = Hash::make($request->password);
        $owner->verification_code = sha1(time());
        $owner->save();     
        

        if($owner != null){
            MailController::sendSignupEmail($owner->name, $owner->email, $owner->verification_code);
            return redirect()->back()->with(session()->flash('alert-success', 'Your account has been created. Please check email for verification link.'));
        }

        return redirect()->back()->with(session()->flash('alert-danger', 'Something went wrong!'));
    }

    public function verifyUser(Request $request){
        $verification_code = \Illuminate\Support\Facades\Request::get('code');
        $owner = Owner::where(['verification_code' => $verification_code])->first();
        if($owner != null){
            $owner->is_verified = 1;
            $owner->save();
            return redirect('/Owner.ownerdashboard')->with(session()->flash('alert-success', 'Your account is verified. Please login!'));
        }

        return redirect()->route('login')->with(session()->flash('alert-danger', 'Invalid verification code!'));
    }
   
}
