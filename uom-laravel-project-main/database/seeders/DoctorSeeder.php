<?php

namespace Database\Seeders;

use App\Models\Doctor;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DoctorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $doctors = [
            [
                'specialization_id' => 9,
                'code' => '001',
                'name' => 'Dr. vipul perera',
                'description' => 'Dr. E.H.C. vipul perera; Kidney problem; Special Notes: Kandy ay Hospital',
                'email' => 'vipulperera@gmail.com',
            ],
            [
                'specialization_id' => 3,
                'code' => '002',
                'name' => 'Dr.Jayasinghe',
                'description' => 'Dr.Jayasinghe  from VPSV Ayurveda college, Kottakkal, kerala and Post Graduation (MD) from Thiruananthapuram kerala in Swasthavrita Expertise in life style disorders and skin diseases management',
                'email' => 'jayasinghe@gmail.com'
            ],
            [
                'specialization_id' => 8,
                'code' => '003',
                'name' => 'Dr.Saliya silva',
                'description' => 'Dr Saliya is· specialist registrar Orthopaedics at National health service Sri lanka',
                'email' => 'saliyas@gmail.com'
            ],
            [
                'specialization_id' => 4,
                'code' => '004',
                'name' => 'Dr. Weerasekara',
                'description' => 'Dr. Weerasekara is bone, joint, muscle and skeletal problems MBBS · MS ( Col ) · FRCS ( Ed ) · FCSSL · MPhil ',
                'email' => 'weerasekara@gmail.com'
            ],
            [
                'specialization_id' => 7,
                'code' => '005',
                'name' => 'Dr. Pathirana',
                'description' => 'Ayurvedic Traditional Medicine in Sri Lanka *Reduction of fat *Fatty Liver *Kidney diseases *Impotence *Erectile Dysfunction (ED) *Most of the common Diseases doctor.',
                'email' => 'pathirana@gmail.com'
            ],
            [
                'specialization_id' => 6,
                'code' => '006',
                'name' => 'Dr. Asitha perera',
                'description' => 'Dr. Asitha perera (Ayurveda Doctors in Sri Lanka) MBBS · MS ( Col ) ',
                'email' => 'asithaperera@gamil.com'
            ],
            [
                'specialization_id' => 2,
                'code' => '007',
                'name' => 'Dr. Romesh silva',
                'description' => 'Dr. Romesh silva Gunawardhana, graduated from Colombo University in 1973 with a diploma in Ayurvedic medicine',
                'email' => 'romeshsilva@gmail.com'
            ]
        ];

        foreach ($doctors as $doctor) {
            $user = new User();
            $user->name = $doctor['name'];
            $user->email = $doctor['email'];
            $user->password = Hash::make('111');
            $user->role = "doctor";
            $user->save();

            Doctor::create([
                'user_id' => $user->id,
                'specialization_id' => $doctor['specialization_id'],
                'code' => $doctor['code'],
                'name' => $doctor['name'],
                'description' => $doctor['description']
            ]);
        }
    }
}
