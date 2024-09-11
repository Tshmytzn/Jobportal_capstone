<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Session;

class AuthMiddleware
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

        return $next($request); 
    }

    protected function checkAuth()
    {
        if (!Session::has('user_id')) {
            return redirect()->route('AdminLogin')->with('error', 'Please login first.');
        }
        
    }
}
