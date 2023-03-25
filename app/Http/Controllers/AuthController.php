<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Inertia\Inertia;
use Inertia\Response;

class AuthController extends Controller
{
    public function create(): Response
    {
        return Inertia::render('Auth/Login');
    }

    /**
     * @throws ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        if(!Auth::attempt($request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]), true)) {
            throw ValidationException::withMessages([
                'email' => 'Authentication failed!'
            ]);
        }
        //regenerate used for security reason to not give access to the attacker by using his session ID.
        $request->session()->regenerate();
        //redirect users to the login page when trying to visit any authenticated page
        return redirect()->intended('/listing');
    }

    public function destroy(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('listing.index');
    }
}
