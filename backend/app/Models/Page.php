<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $fillable = [
        'title',
    ];

    protected $casts = [
        'meta_tags' => 'array',
    ];

    public function metaTags()
    {
        return $this->hasMany(MetaTag::class);
    }

}
