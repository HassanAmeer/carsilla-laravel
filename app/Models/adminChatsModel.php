<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class adminChatsModel extends Model
{
    use HasFactory;
    protected $table = 'adminchats';
    protected $fillable = [
        'id',
        'from',
        'user_id',
        'msg',
        'doc',
    ];
}