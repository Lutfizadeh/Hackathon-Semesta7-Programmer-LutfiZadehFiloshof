<?php

namespace App\Providers;

use App\Actions\AutoAssignReport;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        if(app()->runningInConsole()) {
            return;
        }

        // Auto assign report ke supervisor
        app()->terminating(function() {
            try{
                resolve(AutoAssignReport::class)->handle();
            } catch (\Throwable $e) {
                report($e);
            }
        });
    }
}
