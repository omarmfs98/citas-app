<?php

namespace App\Providers;
use App\Models\Specialty;
use App\User;
use App\Models\Secure;

use Illuminate\Support\ServiceProvider;
use View;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer(['doctors.fields'], function ($view) {
            $specialtyItems = Specialty::pluck('name','id')->toArray();
            $view->with('specialtyItems', $specialtyItems);
        });
        View::composer(['pacientes.fields', 'doctors.fields'], function ($view) {
            $userItems = User::pluck('first_name','id')->toArray();
            $view->with('userItems', $userItems);
        });

        View::composer(['pacientes.fields'], function ($view) {
            $secureItems = Secure::pluck('name','id')->toArray();
            $view->with('secureItems', $secureItems);
        });
        //
    }
}