<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Models\ApplicationSetting;


class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        $general = ApplicationSetting::latest()->first();
        return view('auth.login', compact('general'));
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            if (!auth()->user()->hasPermissionTo('admin-panel')) {
                $request->session()->regenerate();

                return redirect()->intended(RouteServiceProvider::HOME);
            } else {
                Auth::logout();
                return redirect()->back()->with('error', 'You are not a user.');
            }
        } else {
            return redirect()->back()->with('error', 'Invalid credentials');
        }
    }

    public function storeAdmin(LoginRequest $request): RedirectResponse
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            if (auth()->user()->hasPermissionTo('admin-panel')) {
                $request->session()->regenerate();

                return redirect()->route('admin.index');
            } else {
                Auth::logout();
                return redirect()->back()->with('error', 'You are not an admin');
            }
        } else {
            return redirect()->back()->with('error', 'Invalid credentials');
        }
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('login');
    }

    public function destroyAdmin(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('admin-login');
    }
}
