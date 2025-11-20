<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MetaTag extends Model
{
    protected $fillable = ['page_id', 'meta_name', 'meta_value'];
    public function page()
    {
        return $this->belongsTo(Page::class);
    }
}
