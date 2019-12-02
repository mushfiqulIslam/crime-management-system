<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use DB;

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
      $duty = DB::select( DB::raw(
        "SELECT * FROM duty WHERE thana_id =
        (SELECT thana_id FROM supervisor WHERE police_id = '$user') ORDER BY id DESC"));
      $police = DB::select( DB::raw("SELECT name, id FROM police WHERE thana_id =
        (SELECT thana_id FROM supervisor WHERE police_id = '$user')"));
      return view('user_home', compact('duty', 'police', 'user'));
    }

    public function addFIR(Request $request, $user){
      if ($request->isMethod('post')) {
        $result = \App\Police::where('id', '=', $user)->first();
        $fir = new \App\FIR;
        $fir->police_id = $user;
        $fir->thana_id = $result->thana_id;
        $fir->status = request('status');
        $fir->type = request('type');
        $fir->postmortem_report = request('postmortem_report');
        $fir->save();
        return redirect()->action(
          'AdminController@firboard', ['user' => $user]);
      }
      else {
        return view('addFIR', compact('user'));
      }
    }

    public function firboard($user){
      $result = \App\Police::where('id', '=', $user)->first();
      $fir = \App\FIR::where('thana_id', '=', $result->thana_id)->get();
      return view('FIR', compact('user', 'fir'));
    }

    public function add_duty(Request $request, $user){
      if ($request->isMethod('post')) {
        $result = \App\Police::where('id', '=', $user)->first();
        $duty = new \App\Duty;
        $duty->police_id = request('police_id');
        $duty->thana_id = $result->thana_id;
        $duty->start = request('start');
        $duty->finish = request('finish');
        $duty->save();
        return redirect()->action(
          'PagesController@userhome', ['user' => $user]);
      }
      else {
        $result = \App\Police::where('id', '=', $user)->first();
        $police = \App\Police::where('thana_id', '=', $result->thana_id)->get();
        return view('add_duty', compact('user', 'police'));
      }
    }

    public function addaccued(Request $request, $user){
      if ($request->isMethod('post')) {
        $result = \App\Police::where('id', '=', $user)->first();
        $a = new \App\Accused;
        $a->name = request('name');
        $a->fir_id = request('fir_id');
        $a->address = request('address');
        $a->status = request('status');
        $a->l_id = request('lawer_id');
        $a->save();
        return redirect()->action(
          'PagesController@userhome', ['user' => $user]);
      }
      else {
        $result = \App\Police::where('id', '=', $user)->first();
        $result = \App\FIR::where('thana_id', '=', $result->thana_id)->get();
        $lawer = \App\Lawer::get();
        return view('add_accused', compact('user', 'result', 'lawer'));
      }
    }

    public function addlawer(Request $request, $user){
      if ($request->isMethod('post')) {

        $l = new \App\Lawer;
        $l->name = request('name');
        $a->save();
        return redirect()->action(
          'PagesController@userhome', ['user' => $user]);
      }
      else {
        return view('add_accused', compact('user'));
      }
    }
}
