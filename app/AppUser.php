<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AppUser extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'app_users';
    public $timestamps = false;
}