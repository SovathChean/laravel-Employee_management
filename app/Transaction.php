<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    //
    protected $fillable = [
      'customer', 'user_id', 'category_id', 'product_id',
      'price', 'amount',
    ];

    public function user(){
      return $this->belongsTo('App\User');
    }

    public function category(){
      return $this->belongsTo('App\Category');
    }

    public function product(){
      return $this->belongsTo('App\Product');
    }

}
