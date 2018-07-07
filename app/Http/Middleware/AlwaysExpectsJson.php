<?php

namespace App\Http\Middleware;

use Closure;

class AlwaysExpectsJson
{
    /**
     * Handle an incoming request.
     * =========================================================
     * Middleware Personalizado Para automatizar o envio do Cabeçalho (Accept => application/json) pelo cliente
     * =========================================================
     * @param  \Illuminate\Http\Request     $request
     * @param  \Closure                     $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $request->headers->add(['Accept' => 'application/json']);

        return $next($request);
    }

}
