<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Http\Controllers\calculetedHours;

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
        View::composer('components.left-menu', function ($view) {
            $result = (new calculetedHours())->displayHoursWorked();
            $view->with('result', $result);
        });

        View::composer('components.left-menu', function ($view) {
            $nextTime = (new calculetedHours())->getActiveclock();
            $view->with('nextTime', $nextTime);
        });


    }
}
