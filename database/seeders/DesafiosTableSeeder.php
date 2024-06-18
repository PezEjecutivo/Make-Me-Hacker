<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DesafiosTableSeeder extends Seeder
{
    public function run()
    {
        $now = Carbon::now();
        DB::table('desafios')->insert([
            [
                'nombre' => 'java',
                'descripcion' => 'Crear un programa que calcule el factorial de un número utilizando Java.',
                'recompensa' => 65,
                'dificultad' => 100,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'nombre' => 'js',
                'descripcion' => 'Implementar un algoritmo de ordenamiento de una lista en JavaScript.',
                'recompensa' => 175,
                'dificultad' => 325,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'nombre' => 'python',
                'descripcion' => 'Desarrollar un script que encuentre todos los números primos menores que un número dado en Python.',
                'recompensa' => 320,
                'dificultad' => 580,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'nombre' => 'css',
                'descripcion' => 'Diseñar un layout responsive utilizando únicamente CSS puro.',
                'recompensa' => 475,
                'dificultad' => 850,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'nombre' => 'php',
                'descripcion' => 'Crear un sistema de registro y login usando PHP y MySQL.',
                'recompensa' => 650,
                'dificultad' => 1200,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'nombre' => 'java',
                'descripcion' => 'Implementar un algoritmo de búsqueda binaria en un array ordenado usando Java.',
                'recompensa' => 900,
                'dificultad' => 1900,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'nombre' => 'js',
                'descripcion' => 'Desarrollar una calculadora básica utilizando funciones en JavaScript.',
                'recompensa' => 1150,
                'dificultad' => 2500,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'nombre' => 'python',
                'descripcion' => 'Escribir un programa que valide si un número dado es un número de Armstrong en Python.',
                'recompensa' => 1450,
                'dificultad' => 3200,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'nombre' => 'css',
                'descripcion' => 'Crear un efecto de animación de hover para una imagen utilizando CSS.',
                'recompensa' => 1850,
                'dificultad' => 4000,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'nombre' => 'php',
                'descripcion' => 'Implementar un sistema de gestión de tareas con CRUD completo usando PHP y MySQL.',
                'recompensa' => 2300,
                'dificultad' => 5000,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'nombre' => 'java',
                'descripcion' => 'Crear un sistema de gestión de inventarios utilizando Java.',
                'recompensa' => 3500,
                'dificultad' => 10000,
                'created_at' => $now,
                'updated_at' => $now,
            ]
        ]);
    }
}
