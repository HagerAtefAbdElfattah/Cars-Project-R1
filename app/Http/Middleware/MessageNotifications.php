<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class MessageNotifications
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        /**
         * Handle how to share the notifications to all routes.
         */   

        if (Auth::check()) {
            
           $notifications = Auth::user()->unreadNotifications;

           $unreadMessages = Message::where('read', 0)->get();

        }
    //    return dd ($message);
        view()->share('notifications', $notifications);
        view()->share('unreadMessages', $unreadMessages);

        return $next($request);
    }
}
