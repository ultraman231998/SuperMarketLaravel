<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class OrderModel extends Model
{
    public static function getShow($id=NULL){
    	if(!is_null($id)) {
          $data = DB::table('tbl_transaction')->leftJoin('tbl_transaction_detail','tbl_transaction.code_transaction','=','tbl_transaction_detail.transaction_code')->find($id); 
      } else {
    	    $data = DB::table('tbl_transaction')->leftJoin('tbl_transaction_detail','tbl_transaction.code_transaction','=','tbl_transaction_detail.transaction_code')->get();
      }
    	return $data;
    } 
    public static function getShowDetail(){
    	$data1 = DB::table('tbl_transaction_detail')->get();
    	return $data1;
    }
    public static function getDelete($id)
    {
        DB::table('tbl_transaction')->where('id',$id)->delete();

    }         
}
