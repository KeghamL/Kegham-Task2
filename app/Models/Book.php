<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'service_id',
        'guests',
        'datefrom',
        'dateto',
        'message',
        'event',
        'status',

    ];

    public function user()
    {

        return $this->belongsTo('App\Models\User');
    }

    public function service()
    {

        return $this->belongsTo('App\Models\Service');
    }
}
