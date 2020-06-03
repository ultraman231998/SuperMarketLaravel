<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProductModel;

class HomeController extends Controller
{
    public function home()
    {
    	$data['product'] = ProductModel::getShow();
    	return view('Customer.Home',$data);
    }
    
}
