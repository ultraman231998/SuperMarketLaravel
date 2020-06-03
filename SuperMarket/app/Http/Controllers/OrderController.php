<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\OrderModel;
use App\ProductModel;

class OrderController extends Controller
{
    public function show(){
    	$data['order'] = OrderModel::getShow();
    	return view('Admin.Order.List',$data);
    }
    public function showInfo($id){
    	$data['pro'] = ProductModel::getShow();
        $data['order'] = OrderModel::getShow($id);
        $data['detail'] = OrderModel::getShowDetail();

        
        return view('Admin.Order.Info',$data);
    }
    public function deleteInfo($id){
        OrderModel::getDelete($id);
        return redirect()->route('order');
    }
}
