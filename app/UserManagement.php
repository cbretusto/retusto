<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\UserLevel;
use App\RapidXUser;

class UserManagement extends Model
{
    protected $table = 'user_managements';
    protected $connection = 'mysql';

    public function rapidx_user_details()
    {
    	return $this->hasOne(RapidXUser::class, 'name', 'rapidx_name');
    }    

     // first param is the related model and the second param is the FK that you want to reference to, which is the main model(Parent)
    // what is the FK that you want to reference to the related model? user_level_id
    public function user_level(){
        return $this->belongsTo(UserLevel::class, 'user_level_id');
    }
}
