<?php

namespace App\Http\Middleware;

use App\Model\User;
use Closure;
use Illuminate\Support\Facades\Auth;

class Gestore
{
    /**
     * Lascia passare solo gestori e amministratori.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (! Auth::check() || Auth::user()->livello < User::GESTORE) {
            return redirect('/')->with('message', 'Non sei autorizzato ad accedere alla sezione Amministrazione');
        }

        return $next($request);
    }
}
