<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Doctor extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id', 'specialty', 'birth_date'
    ];

    protected $casts = [
        'birth_date' => 'datetime'
    ];
}
