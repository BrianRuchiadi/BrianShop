<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class AppUser extends Model
{
  protected $primaryKey = 'id';
  protected $table = 'app_users';
  public $timestamps = false;
    
}
