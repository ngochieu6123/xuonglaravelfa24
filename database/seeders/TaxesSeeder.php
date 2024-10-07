<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TaxesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('taxes')->insert([
            [
                'id' => 1,
                'tax_name' => 'VAT',
                'rate' => 10.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
