<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Modules\Package\App\Models\Package;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    protected $fillable = ['name', 'icon', 'image', 'status'];
    use HasFactory;

    public function package()
    {
        return $this->hasMany(Package::class);
    }


}
