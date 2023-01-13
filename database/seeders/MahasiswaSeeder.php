<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('mahasiswa')->insert([
            [
                'nama'         => 'Satria Mubin',
                'umur'         =>  20,
                'jenkel'       => 'Laki - Laki',
                'created_at'   => date("Y-m-d H:i:s")
            ],
            [
                'nama'         => 'Reki Setiawan',
                'umur'         =>  20,
                'jenkel'       => 'Laki - Laki',
                'created_at'   => date("Y-m-d H:i:s")
            ],
        ]);
    }
}