<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Logs extends Model
{
    protected $table = 'log';
    protected $primaryKey ='id';
    protected $fillable = [
        'user_id',
        'message',
        'action'
    ];
    public $timestamps = true;
}
