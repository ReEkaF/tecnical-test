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

    public function store(LoginRequest $request): RedirectResponse
    {
        
        $credentials = $request->only('username', 'password');
        
        if ($this->attemptLogin('web-admin', $credentials)) {
            return $this->handleAdminLogin($request);
        } elseif ($this->attemptLogin('web-admin-center', $credentials)) {
            return $this->handleApproverLogin($request);
        }
        return back()->withErrors([
            'password' => 'Password tidak cocok.',
        ])->withInput($request->only('username'));
    }
    private function attemptLogin($guard, $credentials): bool
    {
         // Debug guard dan kredensial untuk memastikan validasi
        return auth()->guard($guard)->attempt($credentials);
    }

    private function handleApproverLogin($request): RedirectResponse
    {
        
        $request->session()->regenerate();
        return redirect()->route('admin-center.dashboard');
    }
    private function handleAdminLogin($request): RedirectResponse
    {
        $request->session()->regenerate();
        return redirect()->route('admin.dashboard');
    }
    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        // Invalidate session dan regenerate token
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');}
}
