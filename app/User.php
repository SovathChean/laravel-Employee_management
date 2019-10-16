<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'is_active', 'role_id', 'photo_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function photo(){

      return $this->belongsTo('App\Photo');

    }


    public function category(){
        return $this->belongsTo('App\Category');
      }

    public function role(){
      return $this->belongsTo('App\Role');
    }


    public function isAdmin(){
      
      if($this->role->role == 'Adminstration')
      {
        return true;
      }


         return false;
    }
}
