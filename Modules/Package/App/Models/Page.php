<?php

namespace Modules\Package\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Package\Database\factories\PageFactory;

class Page extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'title',
        'slug',
        'order_by',
        'content',
        'status',

    ];
    
    protected static function newFactory(): PageFactory
    {
        //return PageFactory::new();
    }
}
