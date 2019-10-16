<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $fillable = [
        'name', 'category_id', 'amount', 'price_in', 'price_out', 'measure_unit',
        'photo_id',
    ];

    public function photo(){
      return $this->belongsTo('App\Photo');
    }

    public function category(){
      return $this->belongsTo('App\Category');
    }
}
