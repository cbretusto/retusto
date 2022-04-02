<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

//MODEL
use App\PlcEvidences;
use App\PLCModuleSA;
use App\PlcCategory;

class SelectPlcEvidence extends Model
{
    protected $table = 'select_plc_evidence';
    protected $connection = 'mysql';

    public function category_details(){
        return $this->hasOne(PlcCategory::class, 'id', 'plc_category_id');
    }
    public function sa_details(){
        return $this->hasOne(PLCModuleSA::class, 'id', 'plc_sa_id');
    }
    public function plc_evidences_details(){
        return $this->hasOne(PlcEvidences::class, 'id', 'plc_evidences_id');
    }
}
