<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SavedEvent extends Model
{
    protected $table = "tb_saved_event";
    public function event(){
		return $this->belongsTo('App\Event', 'id_event');
    }

    public function user(){
		return $this->belongsTo('App\BasicUser', 'id_user');
    }
}
