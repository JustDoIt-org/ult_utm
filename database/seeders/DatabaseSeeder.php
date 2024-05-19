<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(RoleSeeder::class);
        $this->call(InformationSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(AboutSeeder::class);
        $this->call(CarouselsSeeder::class);
        $this->call(SurveyPpidSeeder::class);
    }
}
