<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param \Closure(Request): (Response) $next
     * @return Response
     */
    public function handle(Request $request, Closure $next): Response
    {
        $session = $request->session()->all();
        if(!isset($session['admin'])) {
            return Redirect::route('admin.signin');
        };
        $admin = DB::table('admins')->where('id', $session['admin']['id'])->first();
        $request->session()->put('admin', [
            'id' => $admin->id,
            'name' => $admin->name,
            'email' => $admin->email
        ]);
        return $next($request);
    }
}
