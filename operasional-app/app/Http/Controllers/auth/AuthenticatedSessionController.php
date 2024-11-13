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
    protected function authenticated(Request $request, $user)
    {
        return redirect()->route('home');
    }
    public function create(): View
    {
        return view('auth.login');
    }
    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        
        $credentials = $request->only('username', 'password');
        
        if ($this->attemptLogin('web-admin', $credentials)) {
            return $this->handleAdminLogin($request);
        } elseif ($this->attemptLogin('web-approver', $credentials)) {
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
        $user = auth()->guard('web-approver')->user();
        $request->session()->put('username', $user->username);
        $request->session()->put('jabatan', $user->jabatan);

        if ($user->jabatan === 'supervisor') {
            return redirect()->route('supervisor.dashboard');
        } elseif ($user->jabatan === 'manager') {
            return redirect()->route('manajer.dashboard');
        }
        return back()->withErrors([
            'username' => 'Role tidak dikenali.'
        ])->onlyInput('username');
    }
    private function handleAdminLogin($request): RedirectResponse
    {
        $user = auth()->guard('web-admin')->user();

        $request->session()->regenerate();
        $request->session()->put('username', $user->username);

        return redirect()->route('admin.dashboard');
    }
    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        // Cek guard mana yang sedang login
        $guards = ['web-admin', 'web-approver' ];

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                Auth::guard($guard)->logout();
                break;
            }
        }
        // Invalidate session dan regenerate token
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');}
}
