<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $fillable = [
        'book_id',
        'user_id',
        'fullname',
        'email',
        'address',
        'city',
        'cardname',
        'cardnumber',
        'expdate',
    ];

    public function books()
    {

        return $this->belongsTo('App\Models\Book');
    }

    public function users()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function services()
    {
        return $this->belongsTo('App\Models\Service');
    }
}
