<?php

namespace Modules\Home\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Modules\Home\App\Models\Review;
use Modules\Package\App\Models\Package;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('home::index');
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
    public function store(Request $request, Package $package)
    {
        try {
            $request->validate([
                'rating' => 'required|integer|min:1|max:5',
                'comment' => 'required|string',
            ]);

            if (Auth::check()) {
                $user = Auth::user();
                $booking = $user->bookings()->where('package_id', $package->id)->first();

                if ($booking) {
                    Review::create([
                        'user_id' => $user->id,
                        'package_id' => $package->id,
                        'rating' => $request->input('rating'),
                        'comment' => $request->input('comment'),
                        'status' => 1,
                    ]);

                    return redirect()->back()->with('success', 'Review submitted successfully.');
                } else {
                    return redirect()->back()->with('warning', 'You must book the package before submitting a review.');
                }
            } else {
                return redirect()->back()->with('warning', 'Please log in to submit a review.');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }


    /**
     * Show the specified resource.
     */
    public function show(Package $package)
    {
        $reviews = Review::where('package_id', $package->id)->get();

        $user = $package->user;
        dd($user);
        return view('home::package.detail', compact('package', 'reviews', 'user'));
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
