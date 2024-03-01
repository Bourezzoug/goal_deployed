<?php

namespace App\Providers;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
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
        // Validator::extend('unique_values', function ($attribute, $value, $parameters, $validator) {
        //     $values = is_array($value) ? $value : [$value];
        //     $uniqueValues = array_unique($values);
        //     $uniqueCount = count($uniqueValues);
        //     if ($uniqueCount > 1) {
        //         return false;
        //     }
        //     return true;
        // });
        
        
    }
}
