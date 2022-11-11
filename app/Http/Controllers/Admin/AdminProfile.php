<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminProfile extends Controller
{
    public function profile(){
        $admin= Admin::find(1);
        return view('admin.profile',compact('admin'));
    }

    public function profileEdit($id){

        $EditAdmin = Admin::find($id);

        // if($Admin){
        //     $Admin->name = $request->name;
        //     $Admin->email = $request->email;
        // }
        return view('admin.profile_edit',compact('EditAdmin'));

    }

    public function profileUpdate(Request $request, $id){

        $updateAdmin = Admin::find($id);

        if(!empty($updateAdmin)){
            $updateAdmin->name = $request->name;
            $updateAdmin->email = $request->email;
            // dd($request->file('file'));
            if($request->file('file')){
                $file= $request->file('file');
                @unlink(public_path('assets/upload/admin/'.$updateAdmin->profile_photo_path));
                $filename = date('YmdHi').$file->getClientOriginalName();
                $file->move(public_path('assets/upload/admin/'),$filename);
                $updateAdmin->profile_photo_path = $filename;
            }

            $updateAdmin->save();


        }

        return redirect()->route('admin.profile');

    }

    public function changePassword(Request $request, $id){
        $admin = Admin::find($id);
        return view('admin.change_password',compact('admin'));
    }
    public function storeChangePassword(Request $request, $id){

        $validate = $request->validate([
            'oldpassword'=> 'required',
            'password'=>'required|confirmed',

        ]);


        $checkAdmin = Admin::find($id);

        if(Hash::check($request->oldpassword,$checkAdmin->password)){
            $checkAdmin->name;
            $checkAdmin->email;
            $checkAdmin->password = Hash::make($request->password);
            $checkAdmin->save();
            Auth::logout();
            return redirect()->route('admin.logout');
        }else{
            return redirect()->back();
        }


    }


}
