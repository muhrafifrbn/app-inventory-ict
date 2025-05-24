<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  mixed ...$roles  (role yang diijinkan)
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
        $userRole = auth()->user()->jabatan_lab;

        if (!in_array($userRole, $roles)) {
            // Jika role user tidak termasuk yang diijinkan
            abort(403, 'Akses ditolak.');
        }

        return $next($request);
    }
}

