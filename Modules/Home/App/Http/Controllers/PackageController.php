<?php

namespace Modules\Home\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Package\App\Models\Package;
use function GuzzleHttp\json_decode;

class PackageController extends Controller
{
    public function index()
    {
        
        return view('home::package.index', ['packages' => Package::where('status', 1)->get()]);
    }

    public function detail($id)
    {
        return view('home::package.detail', ['package' => Package::find($id)]);
    }
}
