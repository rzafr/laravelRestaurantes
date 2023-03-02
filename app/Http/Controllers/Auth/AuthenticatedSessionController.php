<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
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
        $request->authenticate();

        $request->session()->regenerate();

        
        // Si se loguea un cliente va a /platos
        // Si se loguea admin, gestor o repartidor va a su Dashboard
        if ($request->user()->rol == "admin") {
            return redirect()->intended(RouteServiceProvider::HOME);
        } else if ($request->user()->rol == "cliente") {
            return redirect()->intended("/platos");
        } else if ($request->user()->rol == "gestor") {
            //return redirect()->intended("/surestaurante");
        } else if ($request->user()->rol == "repartidor") {
            //return redirect()->intended("/suspedidossusdatos");
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

        return redirect('/');
    }
}
