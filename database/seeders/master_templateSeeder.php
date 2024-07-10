<?php

namespace Database\Seeders;

use Database\Factories\master_templateFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class master_templateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        master_templateFactory::new()->count(100)->create();
    }
}
