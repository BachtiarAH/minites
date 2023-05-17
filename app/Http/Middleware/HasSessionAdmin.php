<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class HasSessionAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (session()->has('id') && $this->isRoleAdmin()) {
            return $next($request);
        }else{
            return redirect(route('admin.auth.login.page'))->with([
                'status'=>'fail',
                'message'=>'session tidak ada'
            ]);
        }
    }

    public function isRoleAdmin():bool
    {
        if (session()->has('role')) {
            if (session('role')=='admin') {
                // dd(true);
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }
}
