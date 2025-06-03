<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Resource extends Model
{
    protected $fillable = 
    [
        'title', 
        'description', 
        'image_path', 
        'category_id'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
