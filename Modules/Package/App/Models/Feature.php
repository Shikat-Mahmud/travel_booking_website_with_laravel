<?php

namespace Modules\Package\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Modules\Package\Database\factories\FeatureFactory;

class Feature extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['name'];
    public static $feature;

    protected static function newFactory(): FeatureFactory
    {
        //return FeatureFactory::new();
    }

    public static function getImageUrl($request)
    {
        $image = $request->file('image');
        $extension = $image->getClientOriginalExtension();
        $imageName = time().'.'. $extension;
        $directory = 'assets/images/feature-images/';
        $image->move($directory, $imageName);
        $imageUrl = $directory. $imageName;

        return $imageUrl;
    }

    public static function createFeature($request)
    {
        self::$feature = new Feature();
        self::$feature->name = $request->name;
        self::$feature->description = $request->description;
        self::$feature->icon = $request->icon;
        self::$feature->image = self::getImageUrl($request);
        self::$feature->save();
    }

    public static function updateFeature($request, $id)
    {
        self::$feature = Feature::findOrFail($id);
        if ($request->hasFile('image'))
        {
            if (file_exists(self::$feature->image))
            {
                unlink(self::$feature->image);
            }
            $imageUrl = self::getImageUrl($request);
        }else{
            $imageUrl = self::$feature->image;
        }

        self::$feature->name = $request->name;
        self::$feature->description = $request->description;
        self::$feature->icon = $request->icon;
        self::$feature->image = $imageUrl;
        self::$feature->status = $request->status;
        self::$feature->save();
    }
    public function feature(): BelongsTo
    {
        return  $this->belongsTo(Feature::class);
    }
}
