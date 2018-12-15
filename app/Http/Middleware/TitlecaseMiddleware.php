<?php
/**
 * Created by PhpStorm.
 * User: oleh
 * Date: 14.04.18
 * Time: 23:55
 */

namespace App\Http\Middleware;
use Closure;

class TitlecaseMiddleware
{
    public function handle($request, Closure $next)
    {
        if ($request->title) {
            $request->merge([
                'title' => title_case($request->title)
            ]);
        }

        return $next($request);
    }
}