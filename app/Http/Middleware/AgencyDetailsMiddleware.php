<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Agency;

class AgencyDetailsMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $agency_id = session('agency_id');

        if ($agency_id) {
            $agency = Agency::find($agency_id);
            view()->share('agency', $agency);
        }

        return $next($request);
    }
}

