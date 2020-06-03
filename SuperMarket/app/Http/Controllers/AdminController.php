<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class AdminController extends Controller
{
    public function Login()
    {
    	return view('Admin.Login');
    }
    public function ActionLogin(Request $req){
    	$data = $req->input();
    	$checklogin = DB::table('tbl_admin')->where(['username'=>$data['username'],'password'=>$data['password']])->get();
    	if(count($checklogin) > 0){

              session(['user' => $data['username'],'pass'=>$data['password']]); 
              // $user = $req->session()->get('user');
              return redirect()->route('index');	
    	}
    	else {
    		echo 'Shit';
    	}
    }
    public function logout(Request $req){
    	$req->session()->forget('user');
        return redirect()->route('login');	
    }
    public function index(){
        return view('Admin.Index');
    }
}
