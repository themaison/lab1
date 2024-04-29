<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\VisitStatisticsModel;

class CollectVisitorInfo
{
    public function handle($request, Closure $next)
    {
        if (! $request->is('admin/*')) {
            VisitStatisticsModel::save_statistic($request->path());
        }

        return $next($request);
    }
}
