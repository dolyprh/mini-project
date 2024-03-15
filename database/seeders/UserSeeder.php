<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'id' => '1',
                'id_asisten' => '194274',
                'name' => 'Jowoki',
                'join_date' => \Carbon\Carbon::now(),
                'email' => 'admin@gmail.com',
                'role' => 'admin',
                'password' => Hash::make('123')
            ],
            [
                'id' => '2',
                'id_asisten' => '187274',
                'name' => 'Habibie',
                'join_date' => \Carbon\Carbon::now(),
                'email' => 'habibie@gmail.com',
                'role' => 'admin',
                'password' => Hash::make('123')
            ],
            [
                'id' => '3',
                'id_asisten' => '194234',
                'name' => 'Soekarno',
                'join_date' => '2024-11-02',
                'email' => 'pj@gmail.com',
                'role' => 'pj',
                'password' => Hash::make('123')
            ],
            [
                'id' => '4',
                'id_asisten' => '199834',
                'name' => 'gibran',
                'join_date' => '2024-11-02',
                'email' => 'gibran@gmail.com',
                'role' => 'pj',
                'password' => Hash::make('123')
            ],
            [
                'id' => '5',
                'id_asisten' => '194774',
                'name' => 'Prabowo',
                'join_date' => '2024-11-02',
                'email' => 'asisten@gmail.com',
                'role' => 'asisten',
                'password' => Hash::make('123')
            ],
        ]);
    }
}
