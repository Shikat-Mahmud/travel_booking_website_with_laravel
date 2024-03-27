<?php

use App\Models\ApplicationSetting;
use App\Models\Category;
use App\Models\User;
use Modules\Home\App\Models\Review;
use Modules\Home\App\Models\State;
use Modules\Package\App\Models\Destination;
use Modules\Package\App\Models\Package;

function generalSettings(){
    $application = ApplicationSetting::latest()->first();
    return $application;
}

function states(){
    $state = State::all();
    return $state;
}

function categories(){
    $categories = Category::where('status',1)->orderBy('created_at', 'desc')->take(5)->get();
    return $categories;
}

function packageCategories(){
    $categories = Category::where('status',1)->orderBy('created_at', 'desc')->get();
    return $categories;
}

function reviews(){
    $reviews = Review::latest()->take(5)->get();
    return $reviews;
}

function user($id)
{
    if (Auth::check()) {
        $authenticatedUserId = Auth::id();

        if ($authenticatedUserId == $id) {
            $user = User::find($id);
            return $user;
        }
    }

    return null;
}

function packageDestinations(){
    $destinations = Destination::where('status',1)->orderBy('created_at', 'desc')->get();
    return $destinations;
}

function packages(){
    $packages = Package::where('status', 1)->paginate(3);
    return $packages;
}