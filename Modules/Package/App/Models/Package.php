<?php

namespace Modules\Package\App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Modules\Home\App\Models\Review;
use Modules\Package\Database\factories\PackageFactory;

class Package extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $guarded = ['id'];


    public static function getImageUrl($image)
    {
        $extension = $image->getClientOriginalExtension();
        $imageName = rand() . '.' . $extension;
        $directory = 'assets/images/package-images/';
        $image->move($directory, $imageName);
        $imageUrl = $directory . $imageName;
        return $imageUrl;
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function feature(): HasMany
    {
        return $this->hasMany(Feature::class);
    }

    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class);
    }

}
