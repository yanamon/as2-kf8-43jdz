<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $table = "tb_admin";
    public function event(){
        return $this->hasMany('App\Event');
    }
}