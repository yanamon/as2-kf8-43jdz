<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = "tb_event";
    public function savedEvent(){
        return $this->hasMany('App\SavedEvent');
    }

    public function eventImage(){
      return $this->hasMany('App\EventImage','id_event');
  }

    public function ticket(){
        return $this->hasMany('App\Ticket');
    }

    public function admin(){
		return $this->belongsTo('App\Admin', 'id_admin');
    }

    public function category(){
		return $this->belongsTo('App\Category', 'id_category');
    }

    public function EO(){
		return $this->belongsTo('App\EO', 'id_event_organizer');
    }
}