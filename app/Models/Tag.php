<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;


class Tag extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $guarded = [];

    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = Str::random(7) . '-' . Str::Slug($value);
    }

    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }
}
