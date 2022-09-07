<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use App\Models\Image;

class Post extends Model
{
    /**
     * Get the comments for the blog post.
     */
    public function images()
    {
        return $this->hasMany(Image::class);
    }
}