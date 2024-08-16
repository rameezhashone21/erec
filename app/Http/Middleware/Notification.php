<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\View;
use App\Models\ExamNotification;
use Illuminate\Support\Facades\Auth;


class Notification
{
    public function handle($request, Closure $next)
    {
        $user = Auth::user();

        // // Fetch notifications (you might want to add pagination or filtering here)
        // $notifications = ExamNotification::where('user_id', $user->id)->get();
        
        // // Share notifications with all views
        // View::share('notifications', $notifications);

        return $next($request);
    }
}