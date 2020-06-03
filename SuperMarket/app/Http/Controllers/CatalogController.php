<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CatalogModel;
use App\ProductTypeModel;
use App\ProductModel;
use Session;
class CatalogController extends Controller
{
    public function list()
    {
    	
       if(Session::has('user')){
            $data['catalog'] = CatalogModel::getShow();
           return view('Admin.Catalog.List',$data );
           }
        else {
            return redirect()->route('login');
        }
       
    }
    public function add(Request $req){
         if(Session::has('user')){
    	$name = $req->input('name');

    	CatalogModel::getAdd($name);
    	return redirect()->route('ListCatalog');
          }
        else {
            return redirect()->route('login');
        }
   
    }
    public function edit(Request $req){
      if(Session::has('user')){
    	$id = $req->input('id');
    	$name = $req->input('name');
    	CatalogModel::getEdit($id,$name);
    	return redirect()->route('ListCatalog');
     }
        else {
            return redirect()->route('login');
        }
    }
    public function deletecatalog($id)
    {
        if(Session::has('user')){
         CatalogModel::getDelete($id);
         return redirect()->route('ListCatalog');
     }
        else {
            return redirect()->route('login');
        }

    }
    public function multidelete(){
       if(Session::has('user')){
    	foreach ($_POST['id'] as $id) {
			  CatalogModel::getDelete($id);
	   }
		 return redirect()->route('ListCatalog');
       }
        else {
            return redirect()->route('login');
        }

    }
    public function show(){
          if(Session::has('email')){
          $data['cata'] = CatalogModel::getShow();
          $data['pro'] = ProductModel::getShowSanPham()->paginate(1);
          $data['type'] = ProductTypeModel::getShow();

         return view('Customer.Catalog',$data);
    }
        else {
            return redirect()->route('loginuser');
        }

    }
    public function showByType($id_type)
    {
       if(Session::has('email')){
          $data['cata'] = CatalogModel::getShow();
          $data['pro'] = ProductTypeModel::getSanPhamByIdType($id_type)->paginate(1);
          $data['type'] = ProductTypeModel::getShow();
          return view('Customer.Catalog',$data);
    }

        else {
            return redirect()->route('loginuser');
        }
}
}
