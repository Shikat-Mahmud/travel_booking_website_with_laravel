<?php

namespace Modules\Home\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Home\Database\factories\SliderFactory;

class Slider extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['title', 'description', 'image'];
    public static $slider;

    protected static function newFactory(): SliderFactory
    {
        //return SliderFactory::new();
    }

    public static function getImageUrl($request)
    {
        $image = $request->file('image');
        $extension = $image->getClientOriginalExtension();
        $imageName = time().'.'. $extension;
        $directory = 'assets/images/slider-images/';
        $image->move($directory, $imageName);
        $imageUrl = $directory. $imageName;

        return $imageUrl;
    }

    public static function createSlider($request)
    {
        self::$slider = new Slider();
        self::$slider->title = $request->title;
        self::$slider->description = $request->description;
        self::$slider->image = self::getImageUrl($request);
        self::$slider->save();
    }


    public static function updateSlider($request, $id)
    {
        self::$slider = Slider::findOrFail($id);

        if ($request->hasFile('image'))
        {
            if (file_exists(self::$slider->image))
            {
                unlink(self::$slider->image);
            }
            $imageUrl = self::getImageUrl($request);
        }else{
            $imageUrl = self::$slider->image;
        }

        self::$slider->title = $request->title;
        self::$slider->description = $request->description;
        self::$slider->image = $imageUrl;
        self::$slider->save();
    }
}
