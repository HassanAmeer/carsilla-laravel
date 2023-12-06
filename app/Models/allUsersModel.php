<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class allUsersModel extends Model
{
    use HasFactory;
    protected $table = 'allusers';
    protected $fillable = [
        'id', 
        'usertype',
        'image',
        'fname',
        'lname',
        'phone',
        'email',
        'password',
    ];
}