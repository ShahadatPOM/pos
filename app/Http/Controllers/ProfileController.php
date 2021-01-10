<?php

namespace App\Http\Controllers;

use Image;
use Session;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function profile($id){
        $user = User::find($id);
        return view('profile', compact('user'));
    }

    public function profileStore(Request $r, $id){
        $this->validate($r, [
            // 'name' => 'required',
            // 'firstName' => 'required',
            // 'lastName' => 'required',
            // 'email' => 'required|email',
            // 'country' => 'required',
            // 'city' => 'required',
            // 'mobile' => 'required|max:11',
            // 'address' => 'required',
            // 'about' => 'required',
            // 'designation' => 'required',
            // 'image' => 'required',
        ]);

        $user = User::find($id);
        $user->firstName = $r->firstName;
        $user->lastName = $r->lastName;
        $user->name = $r->name;
        $user->email = $r->email;
        $user->country = $r->country;
        $user->city = $r->city;
        $user->mobile = $r->mobile;
        $user->address = $r->address;
        $user->about = $r->about;
        $user->designation = $r->designation;

        if ($r->hasFile('image')) {
            $originalName = $r->image->getClientOriginalName();
            $uniqueImageName = $r->name.$originalName;
            $image = Image::make($r->image);
            $image->resize(280, 280);
            $image->save(public_path().'/profile/'.$uniqueImageName);
            $user->image = $uniqueImageName;
        }
        $user->status = 0;
        $user->save();
        Session::flash('success', 'Profile updated successfully');
        return back();
    }

    public function generalStore(Request $r){
        
        $this->validate($r, [
            'oldpassword' => 'required',
            'newpassword' => 'required',
        ]);
        
        $user = User::where('email', $r->email)->first();
    
        if(Hash::check($r->oldpassword, $user->password)){
            $user->password = bcrypt($r->newpassword);
            $user->save();
            Session::flash('success', 'Password Changed successfully');
            return back();
        }
        else{
            Session::flash('warning', 'Password Or email do not match');
            return back();
        }

    }
    
}
