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

    public function videos()
    {
        return $this->hasMany(video::class);
    }
}
