<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserModel;
use DB;
use Cart;
use Session;
class UserController extends Controller
{
	public function login()
	{
		return view('Customer.Login');
	}
	public function register()
	{
		return view('Customer.Register');
	}
	public function loginuser(Request $req)
	{
        $data = $req->input();
        $checklogin = DB::table('tbl_user')->where(['email'=>$data['email'],'password'=>$data['password']])->get();
        if(count($checklogin) > 0){

              session(['email' => $data['email'],'pass'=>$data['password']]); 
              // $email = $req->session()->get('email');
              return redirect()->route('cart');	
    	}
    	else {
    		echo 'Shit';
    	}
	}
    public function registeruser(Request $req)
    {
    	$data = $req->input();
    	unset($data['confirmpassword'],$data['_token']);
    	if(DB::table('tbl_user')->where('email',$data['email'])->first()){
               echo "<script language=javascript>window.alert('Email đã sử dụng');window.location='http://localhost:81/SuperMarketLaravel/Register';</script>";
    	}
    	
    	else if(DB::table('tbl_user')->where('phone',$data['phone'])->first()) {
               echo "<script language=javascript>window.alert('Phone đã sử dụng');window.location='http://localhost:81/SuperMarketLaravel/Register';</script>";
    		 
    	}
    	else {
    		  UserModel::getRegister($data);
    		  return view('Customer.DKSuccess');
    	}

    }
    public function logout(Request $req)
    {
        $req->session()->forget('email');
        return redirect()->route('home');
    }
    public function checkout(Request $req)
    {
       if(Session::has('email')){
        $email = $req->session()->get('email');
        $pass = $req->session()->get('pass');
        $data_user['data_user'] = DB::table('tbl_user')->where(['email'=>$email,'password'=>$pass])->get();
        $data_user['sp'] = Cart::content();
        

        
        return view('Customer.Checkout',$data_user);
        }
    else {
            return redirect()->route('loginuser');
        }
	}
	public function addcheckout(Request $req){
		$data = $req->input();    
        $tongtien = Cart::priceTotal();
        $length = 5;
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = 'DH_';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
                          $order = ['code_transaction'=>$randomString,'user_name'=>$data['user_name'],'user_email'=>$data['user_email'], 'user_phone'=>$data['user_phone'],'user_address'=>$data['address'],'total_price'=>$tongtien, 'message'=>$data['message'], 'payment'=>$data['payment_method']];
                            
                            
                             UserModel::getAddOrder($order);
                
                             foreach (Cart::content() as $key => $value) {
                             $orderdetail = ['transaction_code'=>$order['code_transaction'],'product_id' =>$value->id,'qty' =>$value->qty,'price' =>$value->price];

                  
                             UserModel::getAddOrderDetail($orderdetail);
                   
                        }
                             Cart::destroy();
      
        }
	}
