<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FinancialReportsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('financial_reports')->insert([
            [
                'id' => 1,
                'month' => 9,
                'year' => 2024,
                'total_sales' => 19800000,
                'total_expenses' => 20000000,
                'profit_before_tax' => -2000000,
                'tax_amount' => 0,
                'profit_after_tax' => -2000000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
