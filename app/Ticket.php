<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $table = "tb_ticket";
    public function event(){
        return $this->belongsTo('App\Event', 'id_event');
    }

    public function user(){
		    return $this->belongsTo('App\BasicUser', 'id_user');
    }
}