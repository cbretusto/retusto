<?php

namespace App;
use App\PLCModuleRCM;
use App\PlcEvidences;
use Illuminate\Database\Eloquent\Model;

class PLCModuleSA extends Model
{
    protected $table = 'tbl_plc_module_sa';
    protected $connection = 'mysql';

    public function plc_evidences(){
        return $this->hasOne(PlcEvidences::class, 'id', 'internal_control_id');
    }

    public function rcm_module(){
        return $this->hasOne(PLCModuleRCM::class, 'id', 'rcm_id');
    }
}
