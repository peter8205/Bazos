<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use App\Models\Post;

class Image extends Model
{
    /**
     * Get the post that owns the comment.
     */
    protected $fillable = ['name', 'post_id'];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

}