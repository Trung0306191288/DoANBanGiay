<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
class AuthChecker
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, string $role): Response
    {
        if ($role == 'admin') {
            if(auth()->guard('user')->check()){
                if (auth()->guard('user')->user()->id_phan_quyen ==1) {
                    return $next($request);
                } else {
                    return redirect('/admin/login');
                }
            }
            else{
                return redirect('/admin/login');
            }
            return redirect('/admin/login');
        } else {
            if(auth()->guard('user')->check()){
                if (auth()->guard('user')->user()->id_phan_quyen != 1 ) {
                    return $next($request);
                } else {
                    return redirect('/admin/login');
                }
            }
            else{
                return redirect('/admin/login');
            }
        }
    }
}