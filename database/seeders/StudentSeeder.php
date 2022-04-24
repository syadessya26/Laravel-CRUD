<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('students')->insert([
            'nama' => 'Edgar Valhen',
            'jeniskelamin' => 'Laki-laki',
            'nim' => '18083000158',
            'nilai' => 'B+'
        ]);
    }
}
