<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Models\Lesson as Lesson1;
class Lesson
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
        $lesson_id = $request->route('lesson');
        $lesson = Lesson1::find($lesson_id)->first();
        $user= User::find(Auth::id());
        $a = $user->topics()->where('topics.id',$lesson->topic_id)->first();
        if(empty($a)){
            return response()->view('error');
        }
        return $next($request);
    }
}
