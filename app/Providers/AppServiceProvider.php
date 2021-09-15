<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Models\Configration;
use DB;
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
        try {
            DB::connection()->getPdo();
            $configration = \App\Models\Configration::find(1);
        
             View::share('configration',$configration );
            
        }
         catch (\Exception $e) {
          //  die("Could not connect to the database.  Please check your configuration. error:" . $e );
        }
        
    }
}
