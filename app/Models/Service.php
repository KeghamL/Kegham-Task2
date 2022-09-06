<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'price',
    ];

    public function books(){

        return $this->hasMany('App\Models\Book');
    }

    public function payments(){

        return $this->hasMany('App\Models\Payment');
    }
}
