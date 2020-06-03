<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class ProductModel extends Model
{
    protected $table = 'tbl_product';
    public static function getShow($id=NULL)
    {
      if(!is_null($id)) {
          $data = DB::table('tbl_product')->leftJoin('tbl_producttype','tbl_product.producttype_id','=','tbl_producttype.id_type')->find($id); 
      } else {
    	    $data = DB::table('tbl_product')->leftJoin('tbl_producttype','tbl_product.producttype_id','=','tbl_producttype.id_type')->get();
      }
    	return $data;
    }
    public static function getAdd($code_product,$name,$price,$discount,$content,$amount,$supplier_id,$image,$producttype_id)
    {
    	$object = [
    		         'code_product'=>$code_product,
    	           'name'=>$name,
    	           'price'=>$price,
    	           'discount'=>$discount,
    	           'content'=>$content,
    	           'amount'=>$amount,
    	           'supplier_id'=>$supplier_id,
    	           'image'=>$image,
                 'producttype_id'=>$producttype_id
    	          ];
    	$data = DB::table('tbl_product')->insert($object);

    }
  public static function getShowEdit($id)
  {
        $value = DB::table('tbl_product')->where('id',$id)->get();
        return $value;
  }
  public static function getEdit($id,$name,$price,$discount,$content,$amount,$supplier_id,$producttype_id,$image)
  {
       $object = [
                   'id'=>$id,
                   'name'=>$name,
                   'price'=>$price,
                   'discount'=>$discount,
                   'content'=>$content,
                   'amount'=>$amount,
                   'supplier_id'=>$supplier_id,
                   'producttype_id'=> $producttype_id,
                   'image'=>$image
                  ];
        $data = DB::table('tbl_product')->where('id',$id)->update($object);
  }
  public static function getDelete($id)
  {
      DB::table('tbl_product')->where('id',$id)->delete();
  }
  public static function getShowSanPham(){
     $data = DB::table('tbl_product');
     return $data;
  }

}
