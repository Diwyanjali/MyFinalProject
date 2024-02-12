<?php

namespace Database\Seeders;

use App\Models\TimeSlot;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TimeSlotsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $time_slots = [
            '8.30 Am to 9.00 Am',
            '9.00 Am to 9.30 Am',
            '9.30 Am to 10.00 Am',
            '10.00 Am to 10.30 Am',
            '10.30 Am to 11.00 Am',
            '11.00 Am to 11.30 Am',
            '11.30 Am to 12.00 Pm',
            '12.00 Pm to 12.30 Am',
            '12.30 Pm to 01.30 Pm',
            '01.30 Pm to 02.00 Pm',
            '02.00 Pm to 02.30 Pm',
            '02.30 Pm to 03.00 Pm',
            '03.00 Pm to 03.30 Pm',
            '03.30 Pm to 04.00 Pm',
            '04.00 Pm to 04.30 Pm',
            '04.30 Pm to 05.00 Pm',
            '05.00 Pm to 05.30 Pm',
            '05.30 Pm to 06.00 Pm',
            '06.00 Pm to 06.30 Pm',
            '06.30 Pm to 07.00 Pm',
        ];

        foreach($time_slots as $time_slot)
        {
            $timeSlot = new TimeSlot();
            $timeSlot->slot = $time_slot;
            $timeSlot->status = 1;
            $timeSlot->save();
        }
    }
}
