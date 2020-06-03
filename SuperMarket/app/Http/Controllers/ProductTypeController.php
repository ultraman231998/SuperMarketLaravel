<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProductTypeModel;
use App\CatalogModel;
use Session;
class ProductTypeController extends Controller
{
    public function list()
    {
        if(Session::has('user')){
    	$data['catalog'] = CatalogModel::getShow();

        $data['type'] = ProductTypeModel::getShow();

    	return view('Admin.ProductType.List',$data);
     }
        else {
            return redirect()->route('login');
        }
    }
    public function deletetype($id)
    {
         if(Session::has('user')){
         ProductTypeModel::getDelete($id);
         return redirect()->route('ListProductType');
     }
        else {
            return redirect()->route('login');
        }
    }
    public function add(Request $req)
    {
        if(Session::has('user')){
       $name_type = $req->input('name_type');
       $catalog_id = $req->input('catalog_id');
       ProductTypeModel::getAdd($name_type,$catalog_id);
       return redirect()->route('ListProductType');
    }
        else {
            return redirect()->route('login');
        }

    }
    public function edit(Request $req)
    {
       if(Session::has('user')){
        $name_type = $req->input('name_type');
        $catalog_id = $req->input('catalog_id');
        $id_type = $req->input('id_type');
        ProductTypeModel::getEdit($id_type,$name_type,$catalog_id);
        return redirect()->route('ListProductType');
   }
        else {
            return redirect()->route('login');
        }

}
    public function multidelete()
    {
        if(Session::has('user')){
        foreach ($_POST['id_type'] as $id_type) 
            {
                   ProductTypeModel::getDelete($id_type);
                }
                return redirect()->route('ListProductType');
    }
        else {
            return redirect()->route('login');
        }

}
}
