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
        $this->call(UsersTableSeeder::class);
        $this->call(DoctorSpecializationSeeder::class);
        $this->call(TimeSlotsSeeder::class);
        $this->call(RoomSeeder::class);
        $this->call(TreatmentSeeder::class);
        $this->call(DoctorSeeder::class);
    }
}
