<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Cors
{
    /**
     * The URIs that should be excluded from CORS verification.
     *
     * @var array
     */
    protected $except = [
        'media/episodios/*', // Aquí agregamos la ruta de la solicitud de video
    ];

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (!in_array($request->path(), $this->except)) {
            $response = $next($request);

            // Solo establece el encabezado Access-Control-Allow-Origin si no es una solicitud de la lista de excepciones
            $response->headers->set('Access-Control-Allow-Methods', 'POST, GET, OPTIONS, PUT, DELETE');
            $response->headers->set('Access-Control-Allow-Headers', 'Content-Type, Accept, Authorization, X-Requested-With');
            $response->headers->set('Access-Control-Allow-Credentials', 'true');

            // Verifica el origen de la solicitud y establece el encabezado Access-Control-Allow-Origin en consecuencia
            $allowedOrigin = $request->headers->get('Origin');
            if ($allowedOrigin) {
                $response->headers->set('Access-Control-Allow-Origin', $allowedOrigin);
            }

            return $response;
        }

        return $next($request);
    }
}
