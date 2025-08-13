<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class MathAuthMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Retrieve the code from the request body
        $provided = $request->input('authorization');

        if ($provided !== config('services.math.auth')) {
            return redirect()
            ->back()
            ->withErrors(['authorization' => 'The authorization code is incorrect.'])
            ->withInput();
        }

        return $next($request);
    }
}

return redirect()->route('index', ['admin'])->with('error', 'The authorization code is incorrect.');