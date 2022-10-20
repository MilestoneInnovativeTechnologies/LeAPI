<?php

namespace Milestone\LeAPI;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Milestone\LeAPI\Middleware\LeAPIAuth;
use Milestone\LeAPI\Middleware\LeAPILog;

class LeAPIServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(self::path('config.php'), 'leapi');
        config([
            'logging.default'   =>  'daily',
            'app.timezone'      =>  config('leapi.timezone'),
        ]);
        date_default_timezone_set(config('leapi.timezone'));
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        if($this->app->runningInConsole()) {
            $this->publishes([
                self::path('config.php') => config_path('leapi.php')
            ]);
        } else {
            Route::middleware(['api',LeAPIAuth::class,LeAPILog::class])->prefix('leapi/{client}/{action}/{table}')->group(self::path('routes.php'));
        }
    }

    private static function path(...$paths):string {
        return implode(DIRECTORY_SEPARATOR,[__DIR__,'..',...$paths]);
    }
}
