<?php

namespace Modules\Home\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Package\App\Models\Package;

class SearchController extends Controller
{

    public function search(Request $request)
    {
        try {
            $request->validate([
                'location'=> 'required',
                'person' => 'required'
            ]);

            $search_packages = Package::where('status', 1)
                ->orWhere('location', 'like', "%$request->location%")
                ->orWhere('name', 'like', "%$request->location%")
                ->orWhere('person', 'like', "%$request->person%" )
                ->get();


            return view('home::search.index', compact('search_packages'));

        } catch (\Exeption $e){
            return back()->with('error', "Search not complete, cause:". $e->getMessage());
        }

    }

    public function footerSearch(Request $request)
    {
        try {
            $request->validate([
                'name'=> 'required',
                'category_id' => 'required',
                'price' => 'required'
            ]);

            $search_packages = Package::where('status', 1)
                ->orWhere('location', 'like', "%$request->name%")
                ->orWhere('price', 'like', "%$request->price%")
                ->orWhere('category_id', 'like', "%$request->category_id%" )
                ->get();

            return view('home::search.index', compact('search_packages'));

        } catch (\Exeption $e){
            return back()->with('error', "Search not complete, cause:". $e->getMessage());
        }

    }

}
