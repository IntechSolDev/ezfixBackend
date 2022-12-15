<?php

namespace App\Http\Middleware;

use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Cache;
use App\Models\User;

class LastUserActivity
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

        if (Auth::check()) {
           
            $expiresAt = Carbon::now()->addMinutes(3);
            Cache::put('user-is-online'.Auth::user()->id, true, $expiresAt);
            
            /* last seen */
            User::where('id', Auth::user()->id)->update(['last_seen' => now()]);
        }
        // else
        // {
        //     echo "2-ESEs";
        //     die;
        // }
        return $next($request);
    }
}
