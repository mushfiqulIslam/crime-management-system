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
          'PagesController@firboard', ['user' => $user]);
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

    public function selectFIR(Request $request, $user){
      if($request->isMethod('post')){
        $id = request('id');
        return redirect()->action(
          'PagesController@updateFIR', ['user' => $user, 'id' => $id]);

      }
      else {
        $result = \App\Police::where('id', '=', $user)->first();
        $fir = \App\FIR::where('thana_id', '=', $result->thana_id)->get();
        return view('select_FIR', compact('user', 'fir'));
      }
    }

    public function updateFIR(Request $request, $user, $id){
      if($request->isMethod('put')){
        $fir = \App\FIR::find($id);
        $fir->status = request('status');
        $fir->postmortem_report = request('postmortem_report');
        $fir->save();
        return redirect()->action(
          'PagesController@firboard', ['user' => $user]);

      }
      else {
        $fir = \App\FIR::find(request('id'));
        return view('update_fir', compact('user', 'fir'));
      }
      return('PU');
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

    public function addaccused(Request $request, $user){
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
          'PagesController@accused', ['user' => $user]);
      }
      else {
        $result = \App\Police::where('id', '=', $user)->first();
        $result = \App\FIR::where('thana_id', '=', $result->thana_id)->get();
        $lawer = \App\Lawer::get();
        return view('add_accused', compact('user', 'result', 'lawer'));
      }
    }

    public function accused(Request $request, $user){
      $result = \App\Police::where('id', '=', $user)->first();
      $result = DB::table('accused')->join('lawer', 'lawer.id', '=', 'accused.l_id')
      ->join('FIR', 'FIR.id', '=', 'accused.fir_id')
      ->select('accused.name as name', 'accused.address as address', 'accused.fir_id as fir_id',
      'lawer.name as  lawer_name')
      ->where('FIR.thana_id', '=', $result->thana_id)->get();
      return view('accused', compact('user', 'result'));
    }

    public function addlawer(Request $request, $user){
      if ($request->isMethod('post')) {

        $l = new \App\Lawer;
        $l->name = request('name');
        $l->save();
        return redirect()->action(
          'PagesController@userhome', ['user' => $user]);
      }
      else {
        return view('add_l', compact('user'));
      }
    }

    public function addwitness(Request $request, $user){
      if ($request->isMethod('post')) {

        $v = new \App\witness;
        $v->name = request('name');
        $v->statement = request('statement');
        $v->fir_id = request('fir_id');
        $v->save();
        return redirect()->action(
          'PagesController@witness', ['user' => $user]);
      }
      else {
        $result = \App\Police::where('id', '=', $user)->first();
        $result = \App\FIR::where('thana_id', '=', $result->thana_id)->get();
        return view('add_witness', compact('user', 'result'));
      }
    }

    public function witness(Request $request, $user){
      $result = \App\Police::where('id', '=', $user)->first();
      $result1 = \App\FIR::where('thana_id', '=', $result->thana_id)->get();

      //return($result);
      $result = DB::table('witness')->join('FIR', 'FIR.id', '=', 'witness.fir_id')
      ->select('witness.name as name', 'witness.statement as statement', 'FIR.id as fir_id')
      ->where('FIR.thana_id', '=', $result->thana_id)->get();
      return view('witness', compact('user', 'result'));
    }

    public function addvisitor(Request $request, $user){
      if ($request->isMethod('post')) {
        $v = new \App\Visitor;
        $v->name = request('name');
        $v->address = request('address');
        $v->phone_no = request('phone_no');
        $v->a_id = request('a_id');
        $v->relation = request('relation');
        $v->save();
        return redirect()->action(
          'PagesController@visitor', ['user' => $user]);
      }
      else {
        $result = \App\Police::where('id', '=', $user)->first();
        $result = DB::table('accused')->join('FIR', 'FIR.id', '=', 'accused.fir_id')
        ->select('accused.name as name', 'accused.id as id')
        ->where('FIR.thana_id', '=', $result->thana_id)->get();
        return view('add_visitor', compact('user', 'result'));
      }
    }

    public function visitor(Request $request, $user){
      $result = \App\Police::where('id', '=', $user)->first();
      $result1 = \App\FIR::where('thana_id', '=', $result->thana_id)->get();
      $result = DB::table('visitor')->join('accused', 'accused.id', '=', 'visitor.a_id')
      ->join('FIR', 'FIR.id', '=', 'accused.fir_id')
      ->select('visitor.name as name', 'visitor.address as address', 'visitor.phone_no as phone',
       'accused.name as accuse', 'visitor.relation as relation', 'visitor.created_at as time')
      ->where('FIR.thana_id', '=', $result->thana_id)->get();
      return view('visitors', compact('user', 'result'));
    }
}
