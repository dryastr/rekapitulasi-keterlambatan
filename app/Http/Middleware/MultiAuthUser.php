<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MultiAuthUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $userType)
    {
        // Check if the user is authenticated and has the correct role
        if (auth()->check() && auth()->user()->role == $userType) {
            // Additional check to restrict access to certain actions
            if ($this->canAccess($request)) {
                return $next($request);
            }

            // User does not have permission to perform the action
            return response()->json(['error' => 'You do not have permission to perform this action.'], 403);
        }

        // User is not authenticated or does not have the correct role
        return response()->json(['error' => 'You do not have permission to access this page.'], 403);
    }

    /**
     * Check if the user has permission to access certain actions.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return bool
     */
    private function canAccess(Request $request)
    {
        // Modify this logic based on your permission requirements
        // For example, allow access only for GET requests (viewing data)
        return $request->isMethod('get');
    }
}
