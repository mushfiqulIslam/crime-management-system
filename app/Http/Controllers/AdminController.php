<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use DB;
use Carbon\Carbon;

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
    $data1 = DB::table('thana')->join('police', 'police.thana_id', '=', 'thana.id')
    ->join('supervisor', 'supervisor.police_id', '=', 'police.id')
    ->select('thana.id as thana_id', 'thana.name as thana_name', 'police.name as supervisor_name')
    ->get();

    $data2 = DB::table('thana')->join('police', 'police.thana_id', '=', 'thana.id')
    ->select('thana.name as thana_name', DB::raw("count(police.id) as police_number"))
    ->groupBy('thana.id')->get();

    foreach ($data1 as $d1) {
      foreach ($data2 as $d2) {
        if ($d1->thana_name == $d2->thana_name){
          $d1->police_number = $d2->police_number;
        }
      }
    }

    $police = \App\Police::all();
     foreach ($police as $p) {
       $p['age'] = Carbon::parse($p['birth_date'])->age;
       $p['thana'] = DB::table('thana')->where('id', $p['thana_id'])->value('name');
     }
    return view('admin.admin_panel', compact('data1','data2', 'police'));
  }

  public function addpolice(Request $request, $user){
    if ($request->isMethod('post')){

    }
    else{
      return view('admin.add_police');
    }
  }

  public function addthana(Request $request, $user){
    if ($request->isMethod('post')){
      return ('cool');
    }
    else{
      return view('admin.add_thana');
    }
  }

  public function addsuper(Request $request, $user){
    if ($request->isMethod('post')){
      return ('cool');
    }
    else{
      return view('admin.add_supervisor');
    }
  }
}
