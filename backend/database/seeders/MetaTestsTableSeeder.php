<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MetaTestsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('meta_tests')->insert([
            [
                'Name' => 'Test Alpha',
                'Description' => 'This is the description for Test Alpha',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'Name' => 'Test Beta',
                'Description' => 'This is the description for Test Beta',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'Name' => 'Test Gamma',
                'Description' => 'This is the description for Test Gamma',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
