<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to your application's "home" route.
     *
     * Typically, users are redirected here after authentication.
     *
     * @var string
     */
    // public const 
    //public const HOME = '/redirect'; 
    // public const  UserPage = '/userLogin';
   

    /**
     * Define your route model bindings, pattern filters, and other route configuration.
     */
    public function boot(): void
    {//This section configures rate limiting for the 'api' guard. It sets a rate limit of 60 requests per minute based on the user's ID (if authenticated) or the IP address.
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });

        $this->routes(function () {
            Route::middleware('api')
                ->prefix('api')     // used to add a common path segment to a group of routes
                ->group(base_path('routes/api.php'));   //used to define a group of routes sharing common attributes or middleware

            Route::middleware('web')
                ->group(base_path('routes/web.php'));
        });
    }
}
