<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventImage extends Model
{
    protected $table = "tb_event_image";
    
    public function event(){
        return $this->belongsTo('App\Event','id_event');
    }
}
