<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Gate;
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
        // Paginator::useBootstrap();
        //Defining a gate, so i can get the data
        // from the front end
        Gate::define('admin',function(User $user){
            return $user->username === 'alexis1502';
        });
        //Creating a new blade like @if @foreach @can @props
        Blade::if('admin', function () {
            return request()->user()?->can('admin');
        });
    }
}
