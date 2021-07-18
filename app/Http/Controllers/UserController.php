<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function profile()
    {
        $user = Auth::user();
        return view('profile',compact('user',$user));
    }
    public function updateavatar(Request $request){

        $request->validate([
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $user = Auth::user();

        $avatarName = $user->id.'_avatar'.time().'.'.request()->avatar->getClientOriginalExtension();

        $request->avatar->storeAs('avatars',$avatarName);

        $user->avatar = $avatarName;
        $user->save();

        return back()
            ->with('success','You have successfully upload image.');

    }
    public function adminprofile()
    {
        $user = Auth::user();
        return view('admin.profile',compact('user',$user));
    }
    public function adminupdateavatar(Request $request){

        $request->validate([
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
         $user = Auth::user();
        if($request->hasfile('avatar'))
     {
        foreach($request->file('avatar') as $image)
        {
            $name = $image->getClientOriginalName();

            $image->move(public_path().'/adminimag/', $name);  
            @unlink(public_path('/adminimag/'.$data->avatar));
            $data[] = $name;  
        }
     }
       $user->avatar=json_encode($data);
        $user->save();

        return back()
            ->with('success','You have successfully upload image.');

    }
    public function tenantprofile()
    {
        $user = Auth::user();
        return view('tenant.profile',compact('user',$user));
    }
    public function tenantupdateavatar(Request $request){

        $request->validate([
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $user = Auth::user();

        $avatarName = $user->id.'_avatar'.time().'.'.request()->avatar->getClientOriginalExtension();

        $request->avatar->storeAs('avatars',$avatarName);

        $user->avatar = $avatarName;
        $user->save();

        return back()
            ->with('success','You have successfully upload image.');

    }
}
