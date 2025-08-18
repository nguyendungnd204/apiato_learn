<?php

namespace App\Ship\Middleware;

use Closure;
use Illuminate\Http\Request;

class CorsMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if($request->getMethod() === 'OPTIONS')
        {
            $response = response('', 200);
        }
        else
        {
            $response = $next($request);
        }

        $allowedOrigins = explode(',', env('CORS_ALLOWED_ORIGINS', 'http://localhost:3000'));
        $allowedMethods = explode(',', env('CORS_ALLOWED_METHODS', 'GET, POST, PUT, DELETE, OPTIONS, PATCH'));
        $allowedHeaders = explode(',', env('CORS_ALLOWED_HEADERS', 'Content-Type, Authorization, X-Requested-With, Accept, Origin, X-CSRF-TOKEN'));
        $allowedCredentials = env('CORS_ALLOWED_CREDENTIALS', 'true');
        $maxAge = env('CORS_MAX_AGE', 86400);

        $origin = $request->headers->get('Origin');
        if(in_array($origin, $allowedOrigins) || in_array('*', $allowedOrigins))
        {
            $response->headers->set('Access-Control-Allow-Origin', $origin ?: $allowedOrigins[0]);
        }

        // Add CORS headers
        $response->headers->set('Access-Control-Allow-Methods', implode(', ', $allowedMethods));
        $response->headers->set('Access-Control-Allow-Headers', implode(', ', $allowedHeaders));
        $response->headers->set('Access-Control-Allow-Credentials', $allowedCredentials);

        // Handle preflight requests
        if ($request->getMethod() === 'OPTIONS') {
            return response('', 200)
                ->header('Access-Control-Allow-Origin', '*')
                ->header('Access-Control-Allow-Methods', implode(', ', $allowedMethods))
                ->header('Access-Control-Allow-Headers', implode(', ', $allowedHeaders))
                ->header('Access-Control-Allow-Credentials', $allowedCredentials);
        }

        return $response;
    }
}
