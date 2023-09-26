<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'video',
        'link',
        'better',
        'madeWith',
    ];

    public function skills()
    {
        return $this->hasMany(skills::class, 'post_id');
    }

    public function images()
    {
        return $this->hasMany(images::class);
    }
}
