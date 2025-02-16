<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Relations\Relation;
use App\Models\Admin;
use App\Models\Doctor;
use App\Models\Accountant;
use App\Models\Avaliable_time;
use App\Observers\doctor\AvaliableTimeObserve;
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
        //
        Relation::morphMap([
            'admin' => Admin::class,
            'doctor' => Doctor::class,
            'accountant' => Accountant::class,
        ]);
        Avaliable_time::observe(AvaliableTimeObserve::class);
    }
}
