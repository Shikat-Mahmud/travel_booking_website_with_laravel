<?php

namespace Modules\User\App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Modules\Booking\App\Models\Booking;



class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = Auth::user();
        return view('user::user.index', compact('users'),  ['users' => User::all()]);
    }

    public function create()
    {
        return view('user::create');
    }


    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        return view('user::show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $users = Auth::user();
        return view('user::user.edit', compact('users'),  ['users' => User::all()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id): RedirectResponse
    {
        try {
            $request->validate([
                'name' => 'required',
                'email' => 'required|email', 
                'phone' => 'nullable',
                'address' => 'nullable',
                'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            ]);

            $user = User::find($id);

            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->phone = $request->input('phone');
            $user->address = $request->input('address');

            if ($request->hasFile('photo')) {
                if ($user->photo) {
                    Storage::delete($user->photo);
                }

                $imagePath = $request->file('photo')->store('user_photos', 'public');
                $user->photo = $imagePath;
            }

            $user->save();
            return redirect()->route('user.index')->with('success', 'Profile Updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
    }

    public function changePass(Request $request)
    {
        $users = Auth::user();
        return view('user::user.update-password',  compact('users'), [
            'user' => $request->user(),
        ]);
    }

    public function updatePass(Request $request)
    {
        try {
            $user = Auth::user();
    
            $request->validate([
                'current_password' => ['required', function ($attribute, $value, $fail) use ($user) {
                    if (!Hash::check($value, $user->password)) {
                        Session::flash('error', 'The current password does not match.');
                        $fail('The current password does not match.');
                    }
                }],
                'new_password' => 'required|min:8',
                'new_password_confirmation' => 'required|same:new_password',
            ]);
    
            $user->update([
                'password' => bcrypt($request->input('new_password')),
            ]);

            Session::flash('success', 'Password updated successfully.'); 
    
            return redirect()->back()->with('success', 'Password updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
    
    public function booking()
    {
        $users = Auth::user();
        $userId = Auth::user()->id;

        $bookings = Booking::where('user_id', $userId)->paginate(3);
        return view('user::user.booking', compact('users', 'userId', 'bookings'));
    }

}
