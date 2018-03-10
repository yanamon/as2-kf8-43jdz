<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BasicUser extends Model
{
    protected $table = "tb_basic_user";
    public function savedEvent(){
        return $this->hasMany('App\SavedEvent');
    }

    public function ticket(){
        return $this->hasMany('App\Ticket');
    }
}
