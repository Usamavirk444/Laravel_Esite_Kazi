<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function index()
    {
        return view('frontend.index');
    }

    public function userLogout()
    {

        Auth::logout();
        return redirect()->route('login');
    }
    public function userProfile(Request $request)
    {
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('frontend.user_profile', compact('user'));
    }
    public function userProfileUpdate(Request $request)
    {
        $id = Auth::user()->id;
        $user = User::find($id);

        if (!empty($user)) {
            $user->name = $request->name;
            $user->email = $request->email;

            if($request->file('image')){
                $file = $request->file('image');
                if($user->profile_photo_path){
                    @unlink(public_path('assets/upload/user/'. $user->profile_photo_path));
                }
                $filename = date('YmdHi').$file->getClientOriginalName();
                // dd($filename);
                $file->move(public_path('assets/upload/user/'),$filename);
                $user->profile_photo_path = $filename;
            }
            $user->save();
            return redirect()->route('user.profile');
        }
    }

}
