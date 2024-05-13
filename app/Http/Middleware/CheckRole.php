<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $action = $request->route()->getAction();

        if($request->user() !== null) {
            if (($action['prefix'] == '/admin' and $request->user()->role == "admin")) {
                return $next($request);
            }
            if ($action['prefix'] == '/member' and $request->user()->role == "user") {
                return $next($request);
            }
            if ($action['prefix'] == '/member' and $request->user()->role == "admin") {
                return redirect()->route('admin.home');
            }
            if ($action['prefix'] == '/admin' and $request->user()->role == "user") {
                return redirect()->route('member.home');
            }
            if ($action['prefix'] == null) {
                return $next($request);
            }
            return redirect()->route('login');
        }
        return redirect()->route('login');
    }
}
