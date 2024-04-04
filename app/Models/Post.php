<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'title', 'transliterated', 'contents', 'contents_short', 'image_title', 'images',
        'slug', 'published_at', 'is_published', 'is_draft', 'is_trending', 'trend_at'
    ];
}
