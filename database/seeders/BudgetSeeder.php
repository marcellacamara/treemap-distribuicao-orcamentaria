<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BudgetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('budgets')->insert([
            [
                'department' => 'TI',
                'percentage_last_year' => 10.0,
                'percentage_this_year' => 15.0,
            ],
            [
                'department' => 'Marketing',
                'percentage_last_year' => 20.0,
                'percentage_this_year' => 18.0,
            ],
            [
                'department' => 'Financeiro',
                'percentage_last_year' => 25.0,
                'percentage_this_year' => 20.0,
            ],
            [
                'department' => 'Recursos Humanos',
                'percentage_last_year' => 15.0,
                'percentage_this_year' => 20.0,
            ],
            [
                'department' => 'Operacional',
                'percentage_last_year' => 22.0,
                'percentage_this_year' => 22.0,
            ],
            [
                'department' => 'Suporte',
                'percentage_last_year' => 8.0,
                'percentage_this_year' => 5.0,
            ],
        ]);
    }
}
