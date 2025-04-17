<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class People extends Model
{
    protected $table = 'people';
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
        'absence_time'
    ];
    public $timestamps = true;

    public function Category() {
        return $this->belongsTo(Category::class,'category_id', 'id');
    }
}
