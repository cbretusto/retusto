<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\RapidXDepartment;
use App\RapidXUser;

class RapidXUser extends Model
{
    protected $table = 'users';
    protected $connection = 'rapidx';

    public function department(){
        return $this->hasOne(RapidXDepartment::class, 'department_id', 'department_id');
    }
}
