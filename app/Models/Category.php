<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;


class Category extends Model
{
    use HasFactory;
    protected $guarded = ['image'];
    public $timestamps = false;

    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = Str::random(7) . '-' . Str::Slug($value);
    }

    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }

    public function image()
    {
        return $this->morphOne(Image::class,'imageable');
    }
}
