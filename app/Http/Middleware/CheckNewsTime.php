<?php

namespace App\Http\Middleware;

use App\Http\Controllers\FeedbackController;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckNewsTime
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $secretToken = env('MY_SECRET_TOKEN');
        info('Some helpful information!', ['token' => $secretToken]);
        logger('Debug message');
        return $next($request);
    }
}
