<?php

use App\Repositories\Models\Ticket;
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

        factory(Ticket::class,2)->create();

        Model::reguard();
    }
}
