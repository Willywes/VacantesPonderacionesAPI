<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parking extends Model
{

    protected $fillable = [
        'id',
        'title',
        'content',
        'city',
        'period',
        'price',
        'available',
        'user_id',
        'created_at',
        'updated_at'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
