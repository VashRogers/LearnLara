<?php

namespace App\Http\Middleware;

use App\LogAcessoModel;
use Closure;

class LogAcessoMiddleware
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
        //$request : manipular
        $ip = $request->server->get('REMOTE_ADDR');
        $rota = $request->getRequestUri();

        LogAcessoModel::create(['log' => "$ip requisitou $rota"]);
        return $next($request);
        //response - manipular
        // return Response('Teste Middleware');
    }
}
