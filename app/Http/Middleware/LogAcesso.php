<?php

namespace App\Http\Middleware;

use Closure;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Log\LogEngine;

class LogAcesso
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

        $log = new LogEngine();

        $route = Route::currentRouteName();

        $allowed_routes = [
            'home',
            'dashboard'
        ];

        if( Auth::user()->can( $route ) || in_array($route, $allowed_routes)){
            $log->acesso([
                'rota' => $route,
                'usuario' => Auth::user()->name,
                'user_id' => Auth::user()->id,
                'permitido' => true,
            ]);
        }else{
            $log->acesso([
                'rota' => $route,
                'usuario' => Auth::user()->name,
                'user_id' => Auth::user()->id,
                'permitido' => false,
            ]);
        }

        return $next($request);
    }
}
