<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            DesafiosTableSeeder::class,
            DevelopersTableSeeder::class,
        ]);
    }
}
