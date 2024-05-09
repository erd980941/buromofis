<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AuthRequest;
use App\Http\Requests\Admin\LoginRequest;
use App\Http\Requests\Admin\PasswordUpdateRequest;
use App\Http\Requests\Admin\ProfileRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function showLogin(){
        return view('admin.login.login');
    }
    public function login(LoginRequest $request){

       $user=User::where("email",$request->email)->first();

       if($user && Hash::check($request->password,$user->password) && $user->role=="admin" ){
            Auth::login($user);
            return redirect()->route('admin.home');
       }else{
            return redirect()->back();
       }
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('admin.showLogin');
    }

    public function showProfile(){
        return view('admin.profile.profile');
    }
    public function update(ProfileRequest $request){
        $user_email = auth()->user()->email;
        $user=User::where("email",$user_email)->firstOrFail();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->save();
        return redirect()->back()->with('success', 'Profil bilgileri başarıyla güncellendi.');
    }
    public function updatePassword(PasswordUpdateRequest $request){
        $newPassword = Hash::make($request->new_password);

        $user_email = auth()->user()->email;
        $user=User::where("email",$user_email)->firstOrFail();

        if (!Hash::check($request->current_password, $user->password)) {
            return redirect()->back()->with('error', 'Mevcut şifrenizi yanlış girdiniz.');
        }

        $user->password = $newPassword;
        $user->save();

        return redirect()->back()->with('success', 'Şifreniz başarıyla güncellendi.');
    }
}
