<?php

namespace Modules\Package\App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Modules\Package\App\Models\Feature;
use Modules\Package\App\Models\Package;
use Illuminate\Support\Facades\Validator;
use function GuzzleHttp\json_decode;
use function GuzzleHttp\json_encode;
use function PHPUnit\Framework\fileExists;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $packages = Package::all();
        return view('package::package.index', compact('packages') );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::whereStatus(1)->get();
        $features = Feature::whereStatus(1)->get();
        return view('package::package.create', compact('categories', 'features'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'price' => 'required|numeric',
            'category_id' => 'required',
            'features' => 'required',
            'duration' => 'required',
            'person' => 'required',
            'expire_date' => 'required',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);


        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        DB::beginTransaction();

        try {
            $images = [];
            if($request->hasFile('image')){
                foreach ($request->file('image') as $image) {
                    $images[] = Package::getImageUrl($image);
                }
            }



            $inputs = $request->except(['_token']);
            $inputs['features'] = json_encode($request->features);
            $inputs['image'] = json_encode($images);

            $inputs['tour_plan'] = json_encode($request->package_plan);
            Package::create($inputs);

            DB::commit();
            return redirect()->route('package.index')->with('success', 'Package created successfully');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'Failed to create package: ' . $e->getMessage());
        }

    }


    /**
     * Show the specified resource.
     */
    public function show(Package $package)
    {
        return view('package::package.show', compact('package'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Package $package)
    {
        return view('package::package.edit', [
            'categories' => Category::whereStatus(1)->get(),
            'features' => Feature::whereStatus(1)->get()
        ], compact('package'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|min:2',
            'price' => 'required|numeric',
            'category_id' => 'required',
            'features' => 'required',
            'duration' => 'required',
            'person' => 'required',
            'expire_date' => 'required',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        $images = [];

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        DB::beginTransaction();
        try {
            $package = Package::findOrFail($id);


            if($request->hasFile('image')){

                $imgs = json_decode($package->image);

                foreach ($imgs as $img)
                {
                    if (file_exists($img))
                    {
                        unlink($img);
                    }
                }

                foreach ($request->file('image') as $image) {
                    $images[] = Package::getImageUrl($image);
                }

            }else{
                $images = $package->image;
            }

            $inputs = $request->except(['_token']);
            $inputs['features'] = json_encode($request->features);
            $inputs['image'] = $images;
            $inputs['tour_plan'] = json_encode($request->package_plan);
            $package->update($inputs);
            DB::commit();
            return redirect()->route('package.index')->with('success', 'Package updated successfully');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'Failed to create package: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $package = Package::findOrFail($id);
            $images = json_decode($package->image);

            foreach ($images as $image)
            {
                if (file_exists($image))
                {
                    unlink($image);
                }
            }
            $package->delete();

            return back()->with('success', 'Package deleted successfully');
        } catch (\Exception $e)
        {
            return back()->with('error', 'Failed to delete package: '. $e->getMessage());
        }
    }
}
