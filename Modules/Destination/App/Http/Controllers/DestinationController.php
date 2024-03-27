<?php

namespace Modules\Destination\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Modules\Package\App\Models\Destination;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use Exception;

class DestinationController extends Controller
{
    public function indexDestination(){
        $indexData = Destination::all();
        return view('destination::destination.index', compact('indexData'));
    }

    public function createDestination(){
        $categories = Category::where('status', 1)->get();
        return view('destination::destination.create', compact('categories'));
    }

    public function storeDestination(Request $request):RedirectResponse
    {
        try {
        $request->validate([
            'category_id'       => 'required|string|max:30',
            'name'              => 'required|string|max:30',
            'city'              => 'required|string|max:255',
            'short_description' => 'required|string',
            'long_description'  => 'required|string',
            'image'             => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'price'             => 'required|numeric|min:0',
        ]);

        $inputs = $request->all();
            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('products', 'public');
                $inputs['image'] = $imagePath;
            }

            $data = new Destination();
            $data->fill($inputs);
            $data->save();

            return redirect()->route('index.destination')->with('success', 'Destination created successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', $e->getMessage());
        }
    }
    
    public function editDestination($id=null){
        $indexData['categories'] = Category::where('status', 1)->get();
        $indexData['indexData'] = Destination::find($id);
        if (!$indexData['indexData']) {
            return redirect()->back();
        }     
        return view('destination::destination.edit', $indexData);
    }
    


    public function updateDestination(Request $request, $id): RedirectResponse
    {
        try {
            $request->validate([
                'category_id'       => 'required|string|max:30',
                'name'              => 'required|string|max:30',
                'city'              => 'required|string|max:255',
                'short_description' => 'required|string',
                'long_description'  => 'required|string',
                'image'             => 'image|mimes:jpeg,png,jpg,gif|max:2048',
                'price'             => 'required|numeric|min:0',
            ]);

            $data = Destination::findOrFail($id);

            $data->category_id = $request->input('category_id');
            $data->name = $request->input('name');
            $data->city = $request->input('city');
            $data->short_description = $request->input('short_description');
            $data->long_description = $request->input('long_description');
            $data->price = $request->input('price');
            $data->status = $request->input('status');

            if ($request->hasFile('image')) {
                if ($data->image) {
                    Storage::delete($data->image);
                }
            $imagePath = $request->file('image')->store('products', 'public');
            $data->image = $imagePath;
            }

            $data->save();

                    return redirect()->route('index.destination')->with('success', 'Product Updated successfully.');
            } catch (\Exception $e) {
                    return redirect()->back()->with('error', $e->getMessage());
        }
    }


    public function showDestination($id=null){
        $indexData['indexData'] = Destination::find($id);
        if (!$indexData['indexData']) {
            return redirect()->back();
        }     
        return view('destination::destination.show', $indexData);
    }

    

    public function deleteDestination($id=null){
        $destroyData = Destination::find($id);
        $destroyData->delete();
        return redirect()->route('index.destination')->with('success', 'Page Delete successfully.');
    }
}
