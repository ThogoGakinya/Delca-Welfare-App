<?php

namespace App\Providers;
use App\User;
use Illuminate\Support\ServiceProvider;

class AllmembersProvider extends ServiceProvider
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
        view()->composer('*',function($view){
            $view->with('all_members', User::all());
       });
    }
}
