<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use DB;

class AdminController extends Controller
{

  public function signup(Request $request){

    if ($request->isMethod('post')) {
      $user = \App\Admin::where([
        ['name', '=', request('username')],
        ['password', '=', request('password')]
        ])->first();

        if($user){
          return redirect()->action(
            'AdminController@dashboard', ['user' => $user]);
        }
        else{
          Session::flash('msg', 'Wrong Credentials. Try again');
          return redirect()->back();
        }
    }

    else{
      return view('admin.admin_signin');
    }
  }

  public function dashboard($user){
    $user = \App\Admin::find($user);
    $data = DB::table('thana')->join('police', 'police.thana_id', '=', 'thana.id')
    ->join('supervisor', 'supervisor.police_id', '=', 'police.id')
    ->select('thana.name as thana_name', 'police.name as supervisor_name')
    ->get();
    #return ($data);
    return view('admin.admin_panel', compact('data'));
  }

  public function thanalist($user){
    $user = \App\Admin::find($user);
    $data = DB::table('thana')->join('police', 'police.thana_id', '=', 'thana.id')
    ->select('thana.name as thana_name', DB::raw("count(police.id) as police_number"))
    ->groupBy('thana.id')->get();
    return ($data);
    return view('admin.admin_panel', compact('data'));
  }
}
