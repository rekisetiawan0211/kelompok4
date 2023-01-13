<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class UniversitasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('universitas')->insert([
            [
                'fakultas'          => 'Ilmu Komputer',
                'jurusan'           => 'Teknik Informatika',
                'angkatan'          => 2020,
                'mahasiswa_id'      => 1,
                'created_at'    => date("Y-m-d H:i:s")
            ],
            [
                'fakultas'          => 'Ilmu Komputer',
                'jurusan'           => 'Sistem Informasi',
                'angkatan'          => 2019,
                'mahasiswa_id'      => 1,
                'created_at'        => date("Y-m-d H:i:s")
            ],
            [
                'fakultas'          => 'Ilmu Komputer',
                'jurusan'           => 'Sistem Komputer',
                'angkatan'          => 2018,
                'mahasiswa_id'      => 1,
                'created_at'        => date("Y-m-d H:i:s")
            ],

        ]);
    }
}