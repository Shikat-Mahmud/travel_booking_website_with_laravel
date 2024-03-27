<?php

namespace App\Providers;

use App\Models\Category;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

use App\Models\User;
use App\Providers\Gate;
use Modules\Home\App\Models\Slider;
use Modules\Package\App\Models\Feature;
use Modules\Package\App\Models\Package;
use Modules\Package\App\Models\Page;
use Modules\Package\App\Models\Destination;
use View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

        View::composer('*', function ($view){
            $view->with('features', Feature::all());
            $view->with('pages', Page::where('status', 1)->orderBy('order_by', 'asc')->get());
            $view->with('categories', Category::all());
            $view->with('destination', Destination::where('status', 1)->orderBy('id', 'desc')->paginate(4));
            $view->with('destinationdetails', Destination::where('status', 1)->orderBy('id', 'desc')->paginate(6));
            $view->with('generalSettings', generalSettings());
            $view->with('destinations', Destination::all() );
            $view->with('persons' , Package::where('status', 1)->distinct('person')->get('person'));
        });


    }
}
