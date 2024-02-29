<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Cors
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
        $response = $next($request);

        // Permitir solicitudes desde cualquier origen
        $response->headers->set('Access-Control-Allow-Origin', '*');

        // Permitir los siguientes métodos HTTP
        $response->headers->set('Access-Control-Allow-Methods', 'POST, GET, OPTIONS, PUT, DELETE');

        // Permitir los siguientes encabezados
        $response->headers->set('Access-Control-Allow-Headers', 'Content-Type, Accept, Authorization, X-Requested-With');

        // Permitir incluir credenciales en las solicitudes (si es necesario)
        $response->headers->set('Access-Control-Allow-Credentials', 'true');

        return $response;
    }
}
