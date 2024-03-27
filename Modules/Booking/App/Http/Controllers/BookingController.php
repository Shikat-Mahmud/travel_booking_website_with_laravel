<?php

namespace Modules\Booking\App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Modules\Booking\App\Models\Booking;
use Illuminate\Validation\ValidationException;
use Illuminate\Database\QueryException;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bookings = Booking::all();
        return view('booking::booking.index', compact('bookings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        try {
            $request->validate([
                'booking_date' => 'required|date',
                'number_of_people' => 'required|integer|min:1|max:10',
                "booking" => "required|array",
            ]);

            Booking::create([
                'booking_date' => $request->input('booking_date'),
                'number_of_people' => $request->input('number_of_people'),
                'info_data' => json_encode($request->booking),
                'package_id' => $request->input('package_id'),
                'user_id' => Auth::user()->id,
            ]);

            return redirect()->back()->with('success', 'Booking completed successfully.');
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            dd($e->getMessage());
            return redirect()->back()->with('error', 'An error occurred while processing your request.');
        }
    }


    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        $booking = Booking::findOrFail($id);
        return view('booking::booking.show', compact('booking'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('booking::edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateStatus($id)
    {
        try {
            $booking = Booking::findOrFail($id);
            $status = request('status');

            $booking->status = $status;
            $booking->save();

            return redirect()->back()->with('success', 'Status updated successfully.');
        } catch (QueryException $e) {
            return redirect()->back()->with('error', 'Failed to update status. Please try again.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $state = Booking::findOrFail($id);
            $state->delete();
            return back()->with('success', 'Booking deleted successfully.');
        } catch (\Exception $e) {
            return back()->with('error', 'An error occurred while deleting the state.');
        }
    }
}
