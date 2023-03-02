<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RolMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $rol)
    {
        /*
        $out = new \Symfony\Component\Console\Output\ConsoleOutput();
        $out->writeln("Hello from Terminal " . $request->user()->rol . " - " . $rol);
        */

        if (strcmp($request->user()->rol, $rol) != 0 ) {
            return redirect("/error");
        }

        return $next($request);
    }
}
