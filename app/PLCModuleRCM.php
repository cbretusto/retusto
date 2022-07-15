<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PLCModuleRCM extends Model
{
    protected $table = 'tbl_plc_module_rcm';
    protected $connection = 'mysql';

    public function plc_categories_details(){
        return $this->hasOne(PlcCategory::class, 'id', 'category');
    }
}
