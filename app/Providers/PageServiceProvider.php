<?php

namespace App\Providers;

use App\Repositories\Composers\DashboardComposer;
use App\Repositories\Models\Category;
use App\Repositories\Models\Priority;
use Illuminate\Support\ServiceProvider;

class PageServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('tickets.create',function ($view){
            $select = [
                'category'=>Category::pluck('name','id'),
                'priority'=>Priority::pluck('name','id')
            ];
           $view->with('select',$select);
        });

        view()->composer('dashboard',function ($view){

                $categories = Category::with('tickets')->get();

            $view->with('categories',$categories);
        });

        view()->composer('dashboard',DashboardComposer::class);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
