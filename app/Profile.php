<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    //

    public function photo(){
      return $this->belongsTo('App\Photo');
    }
}
