<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $fillable = [
        'name',
        'title',
        'description',
        'meta_tags',
    ];

    protected $casts = [
        'meta_tags' => 'array',
    ];
}
