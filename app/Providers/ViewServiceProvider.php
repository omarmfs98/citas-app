<?php

namespace App\Providers;

use App\Models\Doctor;
use App\Models\Paciente;
use App\Models\Specialty;
use App\User;
use App\Models\Secure;
use Carbon\Carbon;

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
        View::composer(['citas.fields', 'schedules.fields'], function ($view) {
            $doctorItems = Doctor::with('user')->get()->pluck('user.first_name','id')->toArray();
            $view->with('doctorItems', $doctorItems);
        });
        View::composer(['citas.fields'], function ($view) {
            $schedules = Doctor::with(['schedules', 'user'])->get()->toArray();
            $allSchedules = array();
            foreach ($schedules as $key => $schedule) {
                foreach ($schedule['schedules'] as $key => $sche) {
                    $allSchedules[$sche['id']] = Carbon::createFromDate($sche['start_time'])->toDateTimeString();
                }
                $schedulesItems = array(
                    'Dr(a). ' . $schedule['user']['first_name'] => $allSchedules
                );
                
            }
            $view->with('schedulesItems', $schedulesItems);
        });
        View::composer(['citas.fields'], function ($view) {
            $pacienteItems = Paciente::with('user')->get()->pluck('user.first_name','id')->toArray();
            $view->with('pacienteItems', $pacienteItems);
        });
        View::composer(['doctors.fields'], function ($view) {
            $specialtyItems = Specialty::pluck('name','id')->toArray();
            $view->with('specialtyItems', $specialtyItems);
        });
        View::composer(['pacientes.fields', 'doctors.fields', ''], function ($view) {
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