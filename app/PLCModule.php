<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PLCModule extends Model
{
    protected $table = 'tbl_plc_modules';
    protected $connection = 'mysql';

    public function rapidx_user_details()
    {
    	return $this->hasOne(RapidXUser::class, 'id', 'rapidx_id');
    }
}
