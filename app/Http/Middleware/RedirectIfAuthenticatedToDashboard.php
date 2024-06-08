<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
class RedirectIfAuthenticatedToDashboard
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::check()){
            if(Auth::user()->user_type == 'user'){
                return redirect()->route('user.index');
            }elseif(Auth::user()->user_type == 'business_admin'){
                return redirect()->route('business_admin.index');
            }
                return redirect()->route('admin.index');
            
        }
        return $next($request);
    }
}
