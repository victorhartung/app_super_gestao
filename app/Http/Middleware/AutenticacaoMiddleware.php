<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AutenticacaoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $metodo_autenticacao, $perfil)
    {   

        echo $metodo_autenticacao. ' - ' .$perfil.'<br>';

        if($metodo_autenticacao == 'padrao') {
            echo 'Verificar o usuário e senha de um banco de dados m8';
        }

        if($metodo_autenticacao == 'ldap') {
            echo 'Verificar o usuário e senha no AD';
        }

        if(true) {
            
            return $next($request);
        
        }else {
           
            return Response('Acesso negado! Rota exige autenticação');

        }

        
    }
}
