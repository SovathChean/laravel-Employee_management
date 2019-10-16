<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    //
    protected $fillable = [
      'name', 'tel', 'email', 'transaction_id', 'user_id',
    ];

    public function transaction(){
      return $this->belongsTo('App\Transaction');
    }
}
