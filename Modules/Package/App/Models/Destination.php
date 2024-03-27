<?php

namespace Modules\Package\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Package\Database\factories\DestinationFactory;
use App\Models\Category;

class Destination extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['category_id', 'name', 'city', 'short_description', 'long_description', 'image', 'price', 'status'];
    
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    
    // protected static function newFactory(): DestinationFactory
    // {
    //     //return DestinationFactory::new();
    // }
}
