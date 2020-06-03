<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class CatalogModel extends Model
{
	public static function getShow()
    {

    	$data = DB::table('tbl_catalog')->get();
    	return $data;
    }
    public static function getDelete($id)
    {
        $data = DB::table('tbl_catalog')->where('id',$id)->delete();
    }
    public static function getAdd($name){
          $object = ['name'=>$name];
          $data = DB::table('tbl_catalog')->insert($object);
    }
    public static function getEdit($id,$name){
          $object = ['id'=>$id,'name'=>$name];
          $data = DB::table('tbl_catalog')->where('id',$id)->update($object);
    }
}





