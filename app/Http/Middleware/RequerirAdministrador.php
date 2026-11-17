<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RequerirAdministrador
{
    /**
     * Verifica que el usuario autenticado tenga el rol de administrador.
     * Si no lo tiene, cancela la petición y lo redirige al inicio con un mensaje
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
        {
            if ($request->user()->rol_fk != 1){   // 1 es el id de Administrador

               return to_route('home')
                  ->with('feedback.message', 'No tenés permiso para acceder a esta página.')
                  ->with('feedback.status', 'danger');
          }

            return $next($request);
        }
}
