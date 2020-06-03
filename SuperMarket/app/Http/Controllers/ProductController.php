<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProductModel;
use App\SupplierModel;
use App\CatalogModel;
use App\ProductTypeModel;
use Session;

class ProductController extends Controller
{
	public function list()
	{
		if(Session::has('user')){
			$data['product'] = ProductModel::getShow();
			return view('Admin.Product.List',$data);
		}
		else {
			return redirect()->route('login');
		}
		
	}
	public function add()
	{   
		if(Session::has('user')){
		$data['productype'] = ProductTypeModel::getShow();

		$data['supplier'] = SupplierModel::getShow();
		return view('Admin.Product.Add',$data);
		}
		else {
			return redirect()->route('login');
		}
	}
	public function addproduct(Request $req)
	{
        if(Session::has('user')){
		$this->validate($req,
			[
				'name' => 'required|min:3|max:100',
				'content' => 'required|min:20|max:300',
			],
			[
				'name.required'=>'Bạn chưa nhập tên', 
				'price.required'=>'Bạn chưa nhập giá',
				'discount.required'=>'Bạn chưa nhập giá giảm',
				'content.required'=>'Bạn chưa nhập nội dung',
				'amount.required'=>'Bạn chưa nhập số lượng',
				'supplier.required'=>'Bạn chưa chọn hãng',
				'image.required'=>'Bạn chưa chọn ảnh'
			]);
		$length = 5;
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charactersLength = strlen($characters);
		$randomString = 'SP_';
		for ($i = 0; $i < $length; $i++) 
		{
			$randomString .= $characters[rand(0, $charactersLength - 1)];
		}

		$file = $req->image;
		$images =  $file->move('images', $file->getClientOriginalName());
		$data = $req->input();
		$object = [
			$code_product = $randomString,
			$name = $data['name'],
			$price = $data['price'],
			$discount = $data['discount'],
			$content = $data['content'],
			$amount = $data['amount'],
			$supplier_id = $data['supplier_id'],
			$producttype_id = $data['producttype_id'],
			$image = $images
		];
		ProductModel::getAdd($code_product,$name,$price,$discount,$content,$amount,$supplier_id,$image,$producttype_id);
		return redirect()->route('List')->with('thongbao','Thêm thành công');
	}
	else {
			return redirect()->route('login');
		}
		
	}
	public function edit($id)
	{
		if(Session::has('user')){
		$product['producttype'] = ProductTypeModel::getShow();
		$product['supplier'] = SupplierModel::getShow();
		$product['pr']= ProductModel::getShowEdit($id);
		return view('Admin.Product.Edit',$product);
	}
		else {
			return redirect()->route('login');
		}
		
	}
	public function editproduct(Request $req)
	{
		if(Session::has('user')){
		$data = $req->input();


		$file = $req->image;
		$images =  $file->move('images', $file->getClientOriginalName());
		$object = [
			$id = $data['id'],
			$name = $data['name'],
			$price = $data['price'],
			$discount = $data['discount'],
			$content = $data['content'],
			$amount = $data['amount'],
			$supplier_id = $data['supplier_id'],
			$producttype_id = $data['producttype_id'],
			$image = $images

		];


		ProductModel::getEdit($id,$name,$price,$discount,$content,$amount,$supplier_id,$producttype_id,$image);



		return redirect()->route('List');
	}
	else {
			return redirect()->route('login');
		}
		

	}
	public function deleteproduct($id)
	{
		if(Session::has('user')){
		
		ProductModel::getDelete($id);
		return redirect()->route('List');
		}
	else {
			return redirect()->route('login');
		}
	}
	public function multidelete(){
     if(Session::has('user')){
		foreach ($_POST['id'] as $id) 
		{
			ProductModel::getDelete($id);
		}
		return redirect()->route('List');
		}
	else {
			return redirect()->route('login');
		}
		
	}
	public function showInfo($id)
	{

		$data['producttype'] = ProductTypeModel::getShow();
		$data['supplier'] = SupplierModel::getShow();
		$data['pr']= ProductModel::getShowEdit($id);
		return view('Customer.InfoProduct',$data);

	}
	public function testmail()
	{
           return view('TestMail');
	}


}
