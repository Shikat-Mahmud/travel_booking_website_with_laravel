<?php

namespace Modules\Package\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Package\App\Models\Feature;

class FeatureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
//        test commit
        $features = Feature::where('status', 1)->get();
        return view('package::feature.index', compact('features'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('package::feature.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {

        $request->validate([
            'name' => 'required',
            'icon' => 'required',
            'image' => 'required'
        ]);

        Feature::createFeature($request);
        return redirect()->route('feature.index')->with('success', 'Feature created successfully.');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Feature $feature)
    {
        return view('package::feature.edit', compact('feature'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'name' => 'required',
        ]);

        Feature::updateFeature($request, $id);
        return  redirect()->route('feature.index')->with('success', 'Feature updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Feature $feature)
    {
        $feature->delete();

        return back()->with('success', 'Feature deleted successfully');
    }
}
