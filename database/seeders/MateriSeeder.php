<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MateriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('materi')->insert([
            [
                'materi' => 'Algoritma & database',
                'created_at' => now()->toDateString(),
            ],
            [
                'materi' => 'Struktur Data',
                'created_at' => now()->toDateString(),
            ],
            [
                'materi' => 'Pemrograman Berorientasi Objek',
                'created_at' => now()->toDateString(),
            ],
            [
                'materi' => 'Pemrograman Web',
                'created_at' => now()->toDateString(),
            ],
            [
                'materi' => 'Desain Basis Data',
                'created_at' => now()->toDateString(),
            ],
        ]);
    }
}
