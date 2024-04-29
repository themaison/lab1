<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Contracts\Auth\Authenticatable;

class UserModel extends \Illuminate\Foundation\Auth\User
{
    use HasFactory, HasRoles;
    
    protected $table = 'users';
    public $timestamps = false;

    protected $fillable = [
        'fullname', 
        'email', 
        'login', 
        'pass'
    ];
}
