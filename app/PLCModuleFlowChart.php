<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PLCModuleFlowChart extends Model
{
    protected $table = 'tbl_plc_module_flow_charts';
    protected $connection = 'mysql';

    public function rapidx_user_details()
    {
    	return $this->hasOne(RapidXUser::class, 'id', 'rapidx_id');
    }
}
