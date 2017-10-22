-<?php

use App\Repositories\Models\Category;
use App\Repositories\Models\Role;
use App\Repositories\Models\Status;
use App\Repositories\Models\Ticket;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        //User::truncate();

        factory(Role::class,4)->create();
        factory(Status::class,3)->create();
        factory(Category::class,3)->create();
        factory(User::class,1)->create();
        factory(Ticket::class,5)->create();
        User::first()->attachRole(Role::where('name','admin')->first());

        Model::reguard();
    }
}
