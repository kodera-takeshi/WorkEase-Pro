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
        $this->call(AdminRoleSeeder::class);
        $this->call(StatusSeeder::class);
        $this->call(EmployeeStatusSeeder::class);
        $this->call(ManagerialPositionsSeeder::class);
        $this->call(AdminSeeder::class);
        $this->call(CompanySeeder::class);
        $this->call(OfficeSeeder::class);
    }
}
