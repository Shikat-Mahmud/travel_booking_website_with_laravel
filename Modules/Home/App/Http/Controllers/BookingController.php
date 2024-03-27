<?php

namespace Modules\Home\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Modules\Package\App\Models\Package;
use function Laravel\Prompts\alert;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $package = Package::findOrFail($id);
        return view('home::booking.index', compact('package'));
    }


    public function store(Request $request, $id)
    {
        if(Auth::check())
        {
            return redirect()->route('book.create', $id);
        } else {
            return redirect()->route('login')->with('warning', 'Kindly login first to book the package.');
        }
    }

    public function bookPackage($id)
    {
        $package = Package::findOrFail($id);
        return view('home::booking.book', compact('package'));
    }
}
