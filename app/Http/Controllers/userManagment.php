<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Socialite;
use Hash;
use Auth;

class userManagment extends Controller
{
    function social($drive) {
        return Socialite::driver('github')->redirect();
    }

    function reSocial($drive) {
        $user = Socialite::driver('github')->user();
        $name = $user->nickname;
        $pass = md5(rand(1,10000));
        $user = User::updateOrCreate(
            ['email' => $user->email],
            [
                'email' => $user->getEmail(),
                'name'  => $user->getNickname(),
                'password' => Hash::make($pass)
            ]
        );
        Auth::login($user,true);
        return redirect('/');
    }

    function profile() {
        return view('pages/profile');
    }

    function changename(Request $request) {
       $validation = $request->validate([
           'name' => ['required', 'string', 'max:255','min:4'],
       ]);
       if(Auth::check()) {
           $user = User::find(Auth::id());
           $user->name = $request->name;
           $user->save();
           $success = (!$user->wasChanged()) ? '' : 'Your name has been changed successfully!';
           return redirect()->route('profile')->with(['success'=> $success]);
       }
    }
    function changepassword(Request $request) {
        $user = User::find(Auth::id());
        if(Hash::check($request->currentpass,$user->password) && Auth::check()) {
            $validation = $request->validate([
                'newpass' => ['required', 'string', 'min:8', 'confirmed']
            ]);
            $user->password = Hash::make($request->newpass);
            $user->save();
            return redirect()->back()->with(['success'=>'Your name has been sent successfully!']);;
        } else {
            return redirect()->route('profile')->with(['currerror'=>'Wrong password']);
        }
    }

    function delete(Request $request) {
        $user = User::find(Auth::id());
        if(Hash::check($request->password,$user->password)) {
            $user->delete();
            Auth::logout();
            return redirect('/');
        } else {
            return redirect()->route('profile')->with(['password_delete'=>'Wrong password']);
        }
    }
}
