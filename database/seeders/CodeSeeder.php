<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('code')->insert([
            [
                'id'    => '1',
                'code'  => 'Ckdwcd',
                'id_user'  => '2',
                'created_at' => now()->toDateString(),
            ],
            [
                'id'    => '2',
                'code'  => 'kwydvd',
                'id_user'  => '1',
                'created_at' => now()->toDateString(),

            ],[
                'id'    => '3',
                'code'  => 'DERfrs',
                'id_user'  => '3',
                'created_at' => now()->toDateString(),

            ],[
                'id'    => '4',
                'code'  => 'CWEFRf',
                'id_user'  => '1',
                'created_at' => now()->toDateString(),

            ],
        ]);
    }
}
