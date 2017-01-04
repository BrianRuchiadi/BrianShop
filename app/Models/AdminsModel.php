<?php
 
namespace App\Models;
 
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
 
class AdminsModel extends Authenticatable
{
  use Notifiable;
  
  protected $guard = "admins";
 
  protected $primaryKey = 'id';
  protected $table = 'admins';
  public $timestamps = true;
  
  protected $fillable = [
      'name', 'email', 'password'
  ];
  
  protected $hidden = [
      'password', 'remember_token'
  ];
  
  public function sendPasswordResetNotification($token)
  {
      $this->notify( new ResetPasswordNotification( $token) );
  }
}