<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class ProductTypeModel extends Model
{
    public static function getShow()
    {
    	$data = DB::table('tbl_producttype')->leftJoin('tbl_catalog','tbl_producttype.catalog_id','=','tbl_catalog.id')->get();

    	return $data;
    }
    public static function getDelete($id_type)
    {
        $data = DB::table('tbl_producttype')->where('id_type',$id_type)->delete();
    }
    public static function getAdd($name_type,$catalog_id)
    {
          $object = ['name_type'=>$name_type,'catalog_id'=>$catalog_id];
          $data = DB::table('tbl_producttype')->insert($object);
    }
    public static function getEdit($id_type, $name_type,$catalog_id)
    {
          $object = ['id_type'=>$id_type,'name_type'=>$name_type,'catalog_id'=>$catalog_id];
          $data = DB::table('tbl_producttype')->where('id_type',$id_type)->update($object);
    }
    public static function getSanPhamByIdType($producttype_id)
    {     
          $data = DB::table('tbl_product')->where('producttype_id',$producttype_id)->select('tbl_product.*')->join('tbl_producttype','tbl_producttype.id_type','=', 'tbl_product.producttype_id');  
          return $data;
    }
}
