<?php

namespace Modules\Home\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Home\App\Models\Slider;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('home::slider.index', ['sliders' => Slider::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('home::slider.create');
    }

    /**
     * Store a newly created resource in storage.
     */

    public function getImageUrl($request)
    {
        $image = $request->file('image');
        $extension = $image->getClientOriginalExtension();
        $imageName = time().'.'. $extension;
        $directory = 'assets/images/slider-images/';
        $image->move($directory, $imageName);
        $imageUrl = $directory. $imageName;

        return $imageUrl;
    }
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required'
        ]);
        Slider::createSlider($request);

        return redirect()->route('slider.index')->with('success', 'Slider created successful');
    }

    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        return view('home::slider.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Slider $slider)
    {
        return view('home::slider.edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'title' => 'required|string',
            'description' => 'required',
        ]);

        try {

            Slider::updateSlider($request, $id);

            return redirect()->route('slider.index')->with('success', 'Slider updated successful');
        } catch (\Exception $e){
            return back()->with('error', "Slider update not successful: $e");
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $slider = Slider::findOrFail($id);

        if (file_exists($slider->image))
        {
            unlink($slider->image);
        }

        $slider->delete();

        return back()->with('success', 'Slider deleted successful');
    }
}
