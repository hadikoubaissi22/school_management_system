<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Hash;
class UserController extends Controller
{
    function change_password()
    {
        $data['header_title'] = "Change Password";
        return view('profile.change_password',$data);
    }
    function update_change_password(Request $request)
    {
        $user = User::getSignel(Auth::user()->id);
        if(Hash::check($request->old_password,$user->password))
        {
            $user->password = Hash::make($request->new_password);
            $user->save();
            return redirect()->back()->with("success","Password successfully changed");
        }else
        {
            return redirect()->back()->with("error","Old Password is not correct");
        }
    }
}
