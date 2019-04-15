<?php

namespace App\Http\Middleware;

use Closure;
use \Illuminate\Support\Facades\Session;

class CheckOp
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
        if (\Auth::user()->level()->first()->nama_level == 'Operator') {
            return $next($request);
        } elseif (\Auth::user()->level()->first()->nama_level == 'Admin') {
           return redirect()->route('admin'); 
        } else {
            return redirect()->route('peminjam');
        }
    }
}
