<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

class PagesController extends Controller{

    public function home(){
      return view('welcome');
    }

    public function signup(Request $request){

      if ($request->isMethod('post')) {
        $user = \App\Supervisor::where([
          ['email', '=', request('email')],
          ['password', '=', request('password')]
          ])->first();

          if($user){
            return redirect()->action(
              'PagesController@userhome', ['user' => $user->police_id]);
          }
          else{
            Session::flash('msg', 'Wrong Credentials. Try again');
            return redirect()->back();
          }
      }
      else{
        return view('login');
      }
    }

    public function userhome($user){
      $duty = \App\Duty::where
      $scores = $scores->reverse();
      return view('user_home', compact('user'));
    }


}
