<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('words')->insert([
            [
                'user_id' => '1',
                'content' => 'つぶやき1',
            ],
            [
                'user_id' => '2',
                'content' => 'つぶやき2',
            ],
        ]);
    }
}
