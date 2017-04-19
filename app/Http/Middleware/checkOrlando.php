<?php

namespace App\Http\Middleware;

use Closure;

class checkOrlando
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
        $positions = array();
        for ($i = 1; $i < 11; $i++){
            $positions[] = $request->request->get("position$i");
        }
        $count = array_count_values($positions);
        foreach ($count as $c) {
            if ($c > 1)
                return redirect()->back()->withErrors("Vous ne pouvez pas choisir plusieurs fois le même pilote");
        }

        return $next($request);
    }

}
