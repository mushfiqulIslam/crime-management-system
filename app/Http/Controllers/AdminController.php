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
      $police = new \App\Police;
      $police->name = request('police_name');
      $police->birth_date = request('birth_date');
      $police->designation = request('deignation');
      $police->joining_date = request('joining_date');
      $police->thana_id = request('thana_id');
      $police->save();
      return redirect()->action(
        'AdminController@dashboard', ['user' => $user]);
    }
    else{
      $thana = \App\Thana::get();
      return view('admin.add_police', compact('user', 'thana'));
    }
  }

  public function addthana(Request $request, $user){
    if ($request->isMethod('post')){
      $thana = \App\Thana::where('name', '=', request('thana_name'))->first();
      if ($thana === null) {
        $thana = new \App\Thana;
        $thana->name = request('thana_name');
        $thana->address = request('thana_address');
        $thana->save();
        $thana1 = \App\Thana::where('name', '=', request('thana_name'))->get();
        return redirect()->action(
          'AdminController@addpolice', ['user' => $user]);
      }
      else{
        Session::flash('msg', 'Thana Exists');
        return redirect()->back();
      }
    }
    else{
      return view('admin.add_thana', compact('user'));
    }
  }

  public function addsuper(Request $request, $user){
    if ($request->isMethod('post')){
      $police1 = \App\Police::where([
        ['name', '=', request('police_name')],
        ['thana_id', '=', request('thana_id')]])->first();
      $police = new \App\Supervisor;
      $police->police_id = $police1->id;
      $police->thana_id = request('thana_id');
      $police->email = request('email');
      $police->password = request('password');
      $police->save();
      $police1->designation = 'Supervisor';
      $police1->save();
      return redirect()->action(
        'AdminController@dashboard', ['user' => $user]);
    }
    else{
      $thana = \App\Thana::get();
      return view('admin.add_supervisor', compact('user', 'thana'));
    }
  }

  public function removesuper(Request $request, $user){
    if($request->isMethod('post')){
      $police_id = request('police_id');
      $thana_id = request('thana_id');
      $supervisor = \App\Supervisor::where([
        ['police_id', '=', $police_id],
        ['thana_id', '=',$thana_id]
      ])->first();
      $police = \App\Police::where([
        ['id', '=', $police_id],
        ['thana_id', '=',$thana_id],
        ['designation', '=', 'Supervisor']
      ])->first();
      if($supervisor === null){
        Session::flash('msg', 'Wrong Credentials. Try again');
        return redirect()->back();
      }
      else {
        DB::delete("DELETE FROM supervisor where police_id = '$supervisor->police_id'");
        $police->designation = 'Officer';
        $police->save();
        return redirect()->action(
          'AdminController@dashboard', ['user' => $user]);
      }
    }
    else{
      $police = \App\Police::where('designation', '=', 'Supervisor')->get();
      $thana = \App\Thana::get();
      return view('admin.update_supervisor', compact('user', 'police', 'thana'));
    }
  }
}
