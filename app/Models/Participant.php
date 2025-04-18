<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\User;

class Participant extends Model
{
    protected $table = 'participant';
    protected $primaryKey ='id';
    protected $fillable = [
        'unique_code',
        'company',
        'category_id',
        'name',
        'vip',
        'description',
        'payment_status',
        'status',
        'invitation',
        'jersey',
        'no_flight',
        'nominal',
        'absence_time',
        'created_by'
    ];
    public $timestamps = true;

    public function Category() {
        return $this->belongsTo(Category::class,'category_id', 'id');
    }

    public function User() {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }
}
