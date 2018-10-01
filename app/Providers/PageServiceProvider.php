<?php

namespace App\Providers;

use App\Repositories\Composers\DashboardComposer;
use App\Repositories\Models\Category;
use App\Repositories\Models\Priority;
use App\Repositories\Models\Status;
use App\Repositories\Models\Ticket;
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
        //todo cleanup code, this is too clumsy
        view()->composer('layouts.app',function ($view){
            $view->with('active_tickets_count',Ticket::active(0)->count());
        });
        view()->composer('tickets.create',function ($view){
            $select = [
                'category'=>Category::pluck('name','id'),
                'priority'=>Priority::pluck('name','id')
            ];
           $view->with('select',$select);
        });

        view()->composer('dashboard',DashboardComposer::class);

        view()->composer('tickets.show',function ($view){
            //dd(Status::where('name','!=','Complete')->get());
           $view->with('statuses',Status::where('name','!=','Complete')->get());
        });
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
