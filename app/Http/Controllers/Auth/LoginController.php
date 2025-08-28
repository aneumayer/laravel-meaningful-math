<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\RedirectResponse;

class LoginController extends Controller
{
    /**
     * Authenticate the user
     *
     * @param LoginRequest $request
     * @return RedirectResponse
     */
    public function __invoke(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();
        $request->session()->regenerate();
        return redirect()->intended(route('index', absolute: false));
    }
}
