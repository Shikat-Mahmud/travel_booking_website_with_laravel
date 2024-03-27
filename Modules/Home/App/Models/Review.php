<?php

namespace Modules\Home\App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Home\Database\factories\ReviewFactory;

class Review extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'user_id',
        'package_id',
        'rating',
        'comment',
        'status',
    ];
    

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
