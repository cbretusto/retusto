<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PLCModuleSA extends Model
{
    protected $table = 'tbl_plc_module_sa';
    protected $connection = 'mysql';

    public function plc_evidences(){
        return $this->hasOne(PlcEvidences::class, 'id', 'internal_control_id');
    }
}
