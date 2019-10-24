<?php

namespace App\Http\Middleware;

use Closure;
use Carbon\Carbon;
class DateChecker
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
        $today = Carbon::now();
        if($request->duedate < $today){
           return redirect()->back()->with('msg', ['Please enter the correct date.']);
        }

        return $next($request);
    }
}
