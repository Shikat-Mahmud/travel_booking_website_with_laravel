<?php

namespace Modules\Home\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Home\App\Models\Subscribe;
use Illuminate\Validation\ValidationException;

class SubscribeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subscribers = Subscribe::all();
        return view('home::subscribe.index', compact('subscribers'));
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
    public function store(Request $request): RedirectResponse
    {
        try {
            $request->validate([
                'email' => 'required|email|unique:subscribes,email',
            ]);

            $subscribe = Subscribe::create($request->all());

            return back()->with('success', 'Successfully subscribed.');
        } catch (ValidationException $e) {
            return back()->with('error', 'Email is not valid.');
        } catch (\Exception $e) {
            return back()->with('error', 'Something went wrong. Please try again.');
        }
    }

    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        return view('home::show');
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
        try {
            if (auth()->user()->can('delete-subscribe')) {
                $subscribe = Subscribe::findOrFail($id);
                $subscribe->delete();
                return back()->with('success', 'Subscriber deleted successfully.');
            } else {
                return back()->with('error', 'You do not have permission to delete subscriber.');
            }
        } catch (\Exception $e) {
            return back()->with('error', 'An error occurred while deleting the subscriber.');
        }
    }

}
