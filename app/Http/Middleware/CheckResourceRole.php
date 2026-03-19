<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckResourceRole
{
    public function handle(Request $request, Closure $next)
    {
        $resource = $request->route('resource');
        $config   = config("resources.$resource");

        // Si el recurso no existe en config, dejamos pasar (el controlador dará 404)
        if (!$config) {
            return $next($request);
        }

        // Si no tiene restricción de roles, cualquier auth puede acceder
        if (!isset($config['roles'])) {
            return $next($request);
        }

        $user = $request->user();

        foreach ($config['roles'] as $role) {
            if ($user->hasRole($role)) {
                return $next($request);
            }
        }

        abort(403, 'No tienes permiso para acceder a este recurso.');
    }
}
