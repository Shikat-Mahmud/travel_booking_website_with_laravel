<?php

namespace Modules\Home\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Home\Database\factories\SubscribeFactory;

class Subscribe extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['id', 'email'];
    
    protected static function newFactory(): SubscribeFactory
    {
        //return SubscribeFactory::new();
    }
}
