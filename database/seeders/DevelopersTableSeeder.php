<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DevelopersTableSeeder extends Seeder
{
    public function run()
    {
        $now = Carbon::now();
        DB::table('developers')->insert([
            [
                'nombre' => 'James Gosling',
                'precio' => 400,
                'mejora' => 1,
                'especialidad' => 'java',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'nombre' => 'Brendan Eich',
                'precio' => 1200,
                'mejora' => 2,
                'especialidad' => 'js',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'nombre' => 'Guido van Rossum',
                'precio' => 1800,
                'mejora' => 3,
                'especialidad' => 'python',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'nombre' => 'Håkon Wium Lie',
                'precio' => 3200,
                'mejora' => 4,
                'especialidad' => 'css',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'nombre' => 'Rasmus Lerdorf',
                'precio' => 5000,
                'mejora' => 5,
                'especialidad' => 'php',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'nombre' => 'Joshua Bloch',
                'precio' => 7200,
                'mejora' => 6,
                'especialidad' => 'java',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'nombre' => 'Douglas Crockford',
                'precio' => 9800,
                'mejora' => 7,
                'especialidad' => 'js',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'nombre' => 'Van Rossum',
                'precio' => 12800,
                'mejora' => 8,
                'especialidad' => 'python',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'nombre' => 'Cristina Sanchez',
                'precio' => 20000,
                'mejora' => 9,
                'especialidad' => 'js',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'nombre' => 'Victor Pablo Galvan',
                'precio' => 23000,
                'mejora' => 10,
                'especialidad' => 'php',
                'created_at' => $now,
                'updated_at' => $now,
            ]
        ]);
    }
}
