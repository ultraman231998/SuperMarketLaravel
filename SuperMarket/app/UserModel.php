<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;


class UserModel extends Model
{
    public static function getRegister(Array $data){
         DB::table('tbl_user')->insert($data);
    }
    public static function getAddOrder(Array $data)
    {
       DB::table('tbl_transaction')->insert($data);
    }
     public static function getAddOrderDetail(Array $data)
    {
       DB::table('tbl_transaction_detail')->leftJoin('tbl_transaction','tbl_transaction_detail.transaction_code','=','tbl_transaction.code_transaction')->insert($data);
    }
}
