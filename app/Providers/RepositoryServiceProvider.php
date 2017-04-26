<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(\App\Repositories\Contracts\CategoryRepository::class, \App\Repositories\Eloquent\CategoryRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\Contracts\StatusRepository::class, \App\Repositories\Eloquent\StatusRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\Contracts\PriorityRepository::class, \App\Repositories\Eloquent\PriorityRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\Contracts\AgentRepository::class, \App\Repositories\Eloquent\AgentRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\Contracts\TicketRepository::class, \App\Repositories\Eloquent\TicketRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\Contracts\CommentRepository::class, \App\Repositories\Eloquent\CommentRepositoryEloquent::class);
        //:end-bindings:
    }
}
