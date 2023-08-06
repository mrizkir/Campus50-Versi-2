<?php

namespace App\Models;

use PHPOpenSourceSaver\JWTAuth\Contracts\JWTSubject;
use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Lumen\Auth\Authorizable;
use Spatie\Permission\Traits\HasRoles;

class User extends Model implements AuthenticatableContract, AuthorizableContract, JWTSubject
{
  use Authenticatable, Authorizable, HasFactory, HasRoles;

  protected $guard_name = 'api';
  
  /**
   * The accessors to append to the model's array form.
   *
   * @var array
   */
  protected $appends = ['role_name'];
  
  /**
   * nama tabel model ini.
   *
   * @var string
   */
  protected $table = 'user';
  /**
   * primary key tabel ini.
   *
   * @var string
   */
  protected $primaryKey = 'userid';

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'userid', 
    'idbank',
    'username',
    'userpassword',
    'salt',
    'page',
    'group_id',
    'kjur',
    'email',
    'active',
    'isdeleted',
    'theme',
    'foto',
    'token',
    'ipaddress',
    'logintime',
    'date_added',
  ];

  /**
   * enable auto_increment.
   *
   * @var string
   */
  public $incrementing = true;
  /**
   * activated timestamps.
   *
   * @var string
   */
  public $timestamps = false;
  /**
   * The attributes excluded from the model's JSON form.
   *
   * @var array
   */
  protected $hidden = [ 
    'userpassword', 'salt'
  ];
  /**
   * Get the identifier that will be stored in the subject claim of the JWT.
   *
   * @return mixed
   */
  public function getJWTIdentifier()
  {
    return $this->getKey();
  }

  /**
   * Return a key value array, containing any custom claims to be added to the JWT.
   *
   * @return array
   */
  public function getJWTCustomClaims()
  {
    return [];
  }
}
