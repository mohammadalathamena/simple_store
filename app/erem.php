<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class erem extends Authenticatable
{
   protected $guard = 'web';
   protected $table = 'users';
       /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
      'username', 'password', 'email','address','phone','pic'
  ];

  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $hidden = [
      'password', 'remember_token',
  ];
}
