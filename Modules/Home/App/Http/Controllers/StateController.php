<?php

namespace Modules\Home\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Home\App\Models\State;
use Illuminate\Support\Facades\Storage;

class StateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (auth()->check() && auth()->user()->hasAnyPermission(['create-state', 'show-state', 'edit-state', 'delete-state'])) {
            $states = State::all();
            return view('home::state.index', compact('states'));
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (auth()->user()->can('create-state')) {
            $colorOptions = ['#00A2B1', '#0193CF', '#A40047', '#0054A5', '#6054AA', '#FF5BA0'];
            return view('home::state.create', compact('colorOptions'));
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        try {
            $request->validate([
                'title' => 'required|string|max:255',
                'value' => 'required|numeric',
                'icon' => 'required|string',
                'color' => 'required|string|max:7',
            ]);

            $inputs = $request->all();

            $state = new State();
            $state->fill($inputs);

            $state->save();

            return redirect()->route('state.index')->with('success', 'State created successfully.');

        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred. Please try again.');
        }
    }

    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        if (auth()->user()->can('show-state')) {
            $state = State::findOrFail($id);
            return view('home::state.show', compact('state'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        if (auth()->user()->can('edit-state')) {
            $state = State::findOrFail($id);
            $colorOptions = ['#00A2B1', '#0193CF', '#A40047', '#0054A5', '#6054AA', '#FF5BA0'];

            return view('home::state.edit', compact('state', 'colorOptions'));
        } else {
            return redirect()->back()->with('error', 'You do not have permission to edit state.');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id): RedirectResponse
    {
        try {
            $request->validate([
                'title' => 'required|string|max:255',
                'value' => 'required|numeric',
                'icon' => 'required|string',
                'color' => 'required|string|max:7',
            ]);

            $inputs = $request->all();

            $state = State::findOrFail($id);

            $state->update($inputs);

            return redirect()->route('state.index')->with('success', 'State updated successfully.');

        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred. Please try again.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            if (auth()->user()->can('delete-state')) {
                $state = State::findOrFail($id);
                $state->delete();
                return back()->with('success', 'State deleted successfully.');
            } else {
                return back()->with('error', 'You do not have permission to delete state.');
            }
        } catch (\Exception $e) {
            return back()->with('error', 'An error occurred while deleting the state.');
        }
    }
}

