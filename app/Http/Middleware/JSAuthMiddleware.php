<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Session;

class JSAuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        // Call the custom checkAuth function
        $response = $this->checkAuth();
        if ($response instanceof \Illuminate\Http\RedirectResponse) {
            return $response;
        }

        return $next($request); // Allow request to proceed
    }

    // The checkAuth function logic
    protected function checkAuth()
    {
        // Check if the session has 'user_id'
        if (!Session::has('user_id')) {
            // Redirect to home page with an error message if not authenticated
            return redirect()->route('homepage')->with('error', 'Please login first.');
        }
    }
}
