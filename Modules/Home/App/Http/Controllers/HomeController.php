<?php

namespace Modules\Home\App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Home\App\Models\Slider;
use Modules\Home\App\Models\State;
use Modules\Package\App\Models\Package;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tour_packages = Package::where('status', 1)
                                    ->orderBy('id', 'desc')
                                    ->take(12)
                                    ->get();
 
        $states = State::all();
        $categories = Category::where('status',1)->orderBy('created_at', 'desc')->take(5)->get();
        $sliders = Slider::all();
        return view('home::home', compact('states', 'categories', 'tour_packages', 'sliders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('home::create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        //
    }

    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        return view('home::show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('home::edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id): RedirectResponse
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
    }
}
