<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Carbon\Carbon;

class TodayDateServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
         $this->todayDate();
    }

    public function todayDate()
    {
        $date = Carbon::now()->locale('ru_RU');
//        dd($date->dayName);

        View::composer('app.partials.date', function($view){
            $date = Carbon::now()->locale('ru_RU');
            $view->with('todayDay', Carbon::today()->format('d'));
            $view->with('todayDayName', $date->dayName);
            $view->with('todayMonthName', $date->monthName);
            $view->with('todayMonth', Carbon::today()->format('m'));
            $view->with('todayYear', Carbon::today()->format('Y'));
        });
    }

    public function monthName() {

    }
}
