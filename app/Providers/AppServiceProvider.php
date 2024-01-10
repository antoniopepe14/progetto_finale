<?php

namespace App\Providers;


use App\Models\Category;
use App\Models\Condition;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;
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
        if(Schema::hasTable('categories')){
            View::share('categories',Category::all());
        }
        if(Schema::hasTable('conditions')){
            View::share('conditions',Condition::all());
        }

        Paginator::useBootstrap();
    }
}
