<?php

use Illuminate\Database\Seeder;

class BuilingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\building::class,50)->create();
    }
}
