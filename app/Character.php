<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Character extends Model
{
    protected $fillable = [
        'name',
        'birthday',
        'occupation',
        'img',
        'status',
        'nickname',
        'appearance',
        'portrayed',
        'category'
    ];
    protected $casts = [
        'occupation' => 'array',
        'appearance' => 'array'
    ];

}
