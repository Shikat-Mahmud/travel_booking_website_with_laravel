<?php

namespace Modules\Contact\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Contact\Database\factories\ContactFactory;

class Contact extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'location',
        'address',
        'email',
        'phone',
    ];
    
    protected static function newFactory(): ContactFactory
    {
        //return ContactFactory::new();
    }
}
