<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use App\ProductModel;
use Session;

class CartController extends Controller
{
	public function cartShow()
	{
	     $giohang['cart'] = Cart::content();
       return view('Customer.Cart',$giohang);
	}
    public function addcart($id){
    	$cart = ProductModel::getShow($id);
    	$object = [
    		    'id'=> $cart->id,
    		    'name'=> $cart->name,
            'price' => $cart->discount,
            'qty' => 1,
            'weight'=> 0,
    	];      
      Cart::add($object);
    	$giohang['cart'] = Cart::content();
        return redirect()->route('cart',$giohang);	
    }
    public function updatecart(Request $req)
    {
        $cart = Cart::content();
        foreach ($cart as $key => $value)
        {
          
          $total_qty = $req->input('qty_'.$value->id);
          $rowId = $value->rowId;
          Cart::update($rowId,$total_qty);
        
         }
          $giohang['cart'] = Cart::content();
          return redirect()->route('cart',$giohang);
    }
    public function deletecart($id=NULL){
         $r = Cart::content();  
         if($id > 0){
                   foreach ($r as $key => $value) {
                     if ($id==$value->id) {
                          
                         $rowId = $value->rowId;
                       
                          
                         Cart::remove($rowId);
                     } 
                   }
                    $giohang['cart'] = Cart::content();
                    return redirect()->route('cart',$giohang);
           }
           else {
               Cart::destroy();
               $giohang['cart'] = Cart::content();
               return redirect()->route('cart',$giohang);
           }       
    }

}
