<?php

namespace App\Http\Middleware;

use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Closure;

class SentinalMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!Sentinel::check()) { 
            if(!$request->ajax()){
                return redirect()->route('login')->with('error', 'You must be logged to view the page');
            }
    
            return response()->json( [
                'status'  => 'login',
                'message' => 'You must be logged to view the page'
            ], 200 );
        }
        
        return $next($request);
    }
}
