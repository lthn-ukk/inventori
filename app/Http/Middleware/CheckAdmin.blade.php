<?php

namespace App\Http\Middleware;

use Closure;
use \Illuminate\Support\Facades\Session;

class CheckAdmin
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
        if (\Auth::user()->level()->first()->nama_level == 'Admin') {
            return $next($request);
        } elseif (\Auth::user()->level()->first()->nama_level == 'Operator') {
           return redirect()->route('operator'); 
        } else {
            return redirect()->route('peminjam');
        }
    }
}
