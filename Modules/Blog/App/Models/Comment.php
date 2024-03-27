<?php

namespace Modules\Blog\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Blog\Database\factories\CommentFactory;

class Comment extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['blog_id', 'name', 'email', 'phone', 'comment', 'status'];

    
    protected static function newFactory(): CommentFactory
    {
        //return CommentFactory::new();
    }
}
