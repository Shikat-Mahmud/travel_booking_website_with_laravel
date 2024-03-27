<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Category;
use App\Models\Product;
use App\Models\ApplicationSetting;




class IndexController extends Controller
{

    public function index()
    {
        if (auth()->user()->can('admin-panel')) {
            $totalUsers = User::count();
            $totalCategory = Category::count();
            $totalProduct = Product::count();
            $subsetCount = 100;

            $peruser = (($totalUsers / $subsetCount) * 100);
            $percategory = (($totalCategory / $subsetCount) * 100);
            $perproduct = (($totalProduct / $subsetCount) * 100);


            return view('admin.main.index', compact('totalUsers', 'totalCategory', 'totalProduct', 'peruser', 'percategory', 'perproduct'));
        } else {
            return redirect()->back()->with('error', 'You do not have permission to go to admin panel.');
        }
    }

    public function login(){
        $general =  ApplicationSetting::latest()->first();
        return view('admin.main.users.admin_login', compact('general'));
    }
}
