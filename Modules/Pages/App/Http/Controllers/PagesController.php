<?php

namespace Modules\Pages\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Modules\Package\App\Models\Page;
// use App\Models\Category;

class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function indexPages(){
        $indexData = Page::all();
        return view('pages::pages.index', compact('indexData'));
    }

    public function createPages(){

        return view('pages::pages.create');
    }

    public function storePages(Request $request):RedirectResponse
    {

        $validator = Validator::make($request->all(), [
            'title'             => 'required|string|max:30',
            'slug'              => 'required|string|max:30|unique:pages,slug',
            'order_by'          => 'required',
            'content'           => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    
        DB::beginTransaction();
        try {
            $inputs = $request->only(['title', 'slug', 'order_by', 'content']);
    
            Page::create($inputs);
    
            DB::commit();
            return redirect()->route('index.pages')->with('success', 'Page created successfully');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'Failed to create page: ' . $e->getMessage());
        }
    }

    public function editPages($slug=null){
        $indexData = Page::where('slug', $slug)->first();
        if (!$indexData) {
            return redirect()->back();
        }     
        return view('pages::pages.edit', compact('indexData'));
    }
    


    public function updatePages(Request $request, $slug): RedirectResponse
    {
        try {
            $request->validate([
                'title'     => 'required|string|max:30',
                'slug'      => 'required|string|max:30|unique:pages,slug,' . $slug . ',slug',
                'order_by'  => 'required',
                'content'   => 'required',
                'status'    => 'required|in:1,2',
            ]);

            $page = Page::where('slug', $slug)->firstOrFail();

            $page->update([
                'title'     => $request->title,
                'slug'      => $request->slug,
                'order_by'  => $request->order_by,
                'content'   => $request->content,
                'status'    => $request->status,
            ]);

            return redirect()->route('index.pages')->with('success', 'Page updated successfully.');

        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->view('errors.404', [], 404);
        } catch (\Exception $e) {
            \Log::error('Error updating page: ' . $e->getMessage());
            return redirect()->back()->with('error', 'An error occurred. Please try again.');
        }
    }


    public function showPages($slug=null){
        $indexData = Page::where('slug', $slug)->first();
        if (!$indexData) {
            return redirect()->back();
        }     
        return view('pages::pages.show', compact('indexData'));
    }

    public function deletePages($slug=null){
        $page = Page::where('slug', $slug)->firstOrFail();
        $page->delete();
        return redirect()->route('index.pages')->with('success', 'Page Delete successfully.');
    }
    
}
