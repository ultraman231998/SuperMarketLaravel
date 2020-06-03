<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class SupplierModel extends Model
{
    public static function getShow()
    {
    	$data = DB::table('tbl_supplier')->get();
        return $data;
    }
}
