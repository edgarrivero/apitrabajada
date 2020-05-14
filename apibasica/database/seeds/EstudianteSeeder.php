<?php

use Illuminate\Database\Seeder;

class EstudianteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('estudiantes')->insert([
            'nombre' => Str::random(10),
            'edad' => Str::random(10).'@gmail.com',

        ]);
    }
}
