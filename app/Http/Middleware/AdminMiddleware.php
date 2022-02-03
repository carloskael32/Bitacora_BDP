<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        //permisos para las paginas , se usa en las rutas
        if (auth()->check() && auth()->user()->acceso == 'yes') {
            
            return $next($request);
        }

        return redirect('/bitacora');
    }
}
