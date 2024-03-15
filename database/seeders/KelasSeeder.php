<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kelas')->insert([
            [
                'jurusan' => 'sistem informasi',
                'fakultas' => 'Ilmu komputer & informasi teknologi',
                'tingkat' => '5',
                'nama_kelas' => '4KA21'
            ],
            [
                'jurusan' => 'teknik informatika',
                'fakultas' => 'Ilmu komputer & informasi teknologi',
                'tingkat' => '4',
                'nama_kelas' => '3KA19'
            ],
            [
                'jurusan' => 'manajemen informatika',
                'fakultas' => 'Ekonomi dan Bisnis',
                'tingkat' => '3',
                'nama_kelas' => '2MI18'
            ],
            [
                'jurusan' => 'teknik komputer',
                'fakultas' => 'Ilmu komputer & informasi teknologi',
                'tingkat' => '6',
                'nama_kelas' => '5TK20'
            ],
            [
                'jurusan' => 'sistem komputer',
                'fakultas' => 'Ilmu komputer & informasi teknologi',
                'tingkat' => '4',
                'nama_kelas' => '3SK19'
            ]
        ]);
    }
}
