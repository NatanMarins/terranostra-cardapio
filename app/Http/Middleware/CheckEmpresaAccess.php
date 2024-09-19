<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckEmpresaAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();

        // Permitir que o superadmin tenha acesso total
        if ($user->role === 'Super Admin') {
            return $next($request);
        }

        // Verifique se o usuário está logado e tem uma empresa associada
        if (!$user || !$user->empresa) {
            abort(403, 'Acesso negado.');
        }

        // Filtra as requisições de acordo com a empresa do usuário
        $request->merge(['empresa_id' => $user->empresa_id]);

        return $next($request);
    }
}