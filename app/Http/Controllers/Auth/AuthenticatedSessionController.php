<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $credetial = $request->only('email','password');
        
        if(Auth::attempt($credetial))
        {
            
            $user = Auth::user();
                if($user->role_id == 1)
                {   
                    $request->session()->regenerate();
                    return redirect('dashboard')->with('status', 'Admin successfully logged in.....');
                }
                elseif($user->role_id == 2)
                {
                    $request->session()->regenerate();
                    return redirect()->route('home')->with('status', 'User successfully logged in.....');
                }
                elseif($user->role_id == 3)
                {
                    $request->session()->regenerate();
                    return redirect()->route('CompanyDashboard')->with('status', 'Company person successfully logged in.....');
                }
            
            return redirect()->route('login')->with('status', 'wrong role selected...');
        }
        return redirect()->route('login')->with('status', 'Login failed');
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login')->with('status','logout successfully...');
    }
}
