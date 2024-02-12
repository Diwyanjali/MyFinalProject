<?php

namespace Database\Seeders;

use App\Models\Room;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $rooms = [
            [
                'category' => 'Normal',
                'air_condition_type' => 'Non A/C',
                'no_of_pax' => '2 Pax',
                'bed_type' => 'Double Bed',
                'image' => 'https://i.pinimg.com/736x/80/8e/79/808e792727834549f3bda56c5e5db730.jpg',
                'description' => 'Experience comfort and convenience in our Normal Room. A perfect choice for a relaxed stay, offering all the essential amenities to make you feel at home. Enjoy a pleasant and affordable accommodation option, ideal for both business and leisure travelers.',
                'quantity' => 10
            ],
            [
                'category' => 'Semi luxury',
                'air_condition_type' => 'A/C',
                'no_of_pax' => '3 Pax',
                'bed_type' => 'Master Bed',
                'image' => 'https://i.pinimg.com/564x/55/52/48/555248662f8d70fbbd6c09e34b11f907.jpg',
                'description' => 'Indulge in the ultimate luxury experience with our exquisite Luxury Room. Revel in opulent surroundings, top-notch amenities, and unparalleled comfort. Treat yourself to an extraordinary stay in style and sophistication.',
                'quantity' => 8
            ],
            [
                'category' => 'Luxury',
                'air_condition_type' => 'A/C',
                'no_of_pax' => '3 Pax',
                'bed_type' => 'King Bed',
                'image' => 'https://i.pinimg.com/originals/c6/aa/3a/c6aa3a04694adecf1f2ae38a1ac2d328.jpg',
                'description' => 'Welcome to the epitome of extravagance - our Super Luxury Room. Prepare to be amazed by the grandeur and sophistication it offers. Immerse yourself in lavish amenities, stunning decor, and unrivaled elegance.',
                'quantity' => 5
            ],
        ];

        foreach($rooms as $room)
        {
            Room::create([
                'slug' => Str::slug($room['category'], '-'),
                'category' => $room['category'],
                'air_condition_type' => $room['air_condition_type'],
                'no_of_pax' => $room['no_of_pax'],
                'bed_type' => $room['bed_type'],
                'image' => $room['image'],
                'description' => $room['description'],
                'quantity' => $room['quantity'],
            ]);
        }
    }
}
