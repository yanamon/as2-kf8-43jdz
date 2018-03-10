<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EO extends Model
{
    protected $table = "tb_event_organizer";
    public function event(){
        return $this->hasMany('App\Event');
    }
}
