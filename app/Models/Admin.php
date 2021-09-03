<?php

namespace App\Models;


use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    protected $table = 'admins';

    protected $fillable = ['name', 'email', 'password','role_id'];

    public $timestamps = true;

}
