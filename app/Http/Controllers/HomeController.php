<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use Image;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function getProfile(){
        return view('user.profile');
    }

    public function postAvatar(Request $request){
        $this->validate($request, [
            'avatar' => 'image',
            ]);

        //handles image upload
        $user = Auth::user();
        
        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $filename =time(). '.' .$avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(121, 121)->save(public_path('/images/avatars/'. $filename));

            $user->avatar = $filename;

            $user->save();

            Session::flash('success', 'Your avatar was successfully updated!');

            return redirect()->route('user.profile');
        }
    }
}
