<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CheckMeetingAuthentication
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Symfony\Component\HttpFoundation\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $id_meeting = $request->route('id_meeting');
        if (!Session::has('authenticated') || Session::get('authenticated_id_meeting') != $id_meeting) {
            return redirect()->route('showPortal')->with('id_meeting', $id_meeting);
        }

        return $next($request);
    }
}
