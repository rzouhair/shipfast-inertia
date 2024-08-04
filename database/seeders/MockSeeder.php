<?php

namespace Database\Seeders;

use App\Models\Mock;
use Database\Factories\MockFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MockSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Mock::factory(10)->create();
    }
}
