<?php

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
        // $this->call(UsersTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(BuilingTableSeeder::class);
        $this->call(SectorTableSeeder::class);
        $this->call(AssetTableSeeder::class);
    }
}
