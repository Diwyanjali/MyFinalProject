<?php

namespace Database\Seeders;

use App\Models\DoctorSpecialization;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DoctorSpecializationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $doctor_specializations = [
            [
                'name' => 'Gastritis',
                'description' => "Gastritis is inflammation in your stomach lining. It's usually temporary (acute), but some people have chronic gastritis."
            ],
            [
                'name' => 'Diabetes AND Cholesterol',
                'description' => "Diabetes damages the lining of your arteries. This means it's more likely that cholesterol will stick to them, making them narrow or even blocked. If you have diabetes, you will usually have lower levels of HDL (good) cholesterol and higher levels of LDL/non-HDL (bad) cholesterol"
            ],
            [
                'name' => 'Skin diseases',
                'description' => 'Skin disorders, such as acne and eczema, vary greatly in symptoms and severity. They can be temporary or permanent and may be painless or painful.'
            ],
            [
                'name' => 'Joint diseases',
                'description' => "Joint disorders are diseases or injuries that affect your joints. Injuries can happen because of overuse of a joint."
            ],
            [
                'name' => 'Arthritis',
                'description' => '"Arthritis" literally means joint inflammation. Joints are places where two bones meet, such as your elbow or knee.'
            ], 
            [
                'name' => 'Headache',
                'description' => 'Headache pain results from signals interacting among your brain, blood vessels and surrounding nerves. During a headache, multiple mechanisms activate specific nerves that affect muscles and blood vessels. These nerves send pain signals to your brain, causing a headache'
            ],
            [
                'name' => 'Liver problems',
                'description' => 'There are many kinds of liver diseases: Diseases caused by viruses, such as hepatitis A, hepatitis B, and hepatitis C. Diseases caused by drugs, poisons, or too much alcohol. Examples include fatty liver disease and cirrhosis'
            ],
            [
                'name' => 'Osteoporosis',
                'description' => 'Osteoporosis is a bone disease that develops when bone mineral density and bone mass decreases, or when the quality or structure of bone changes'
            ],
            [
                'name' => 'Kidney problem',
                'description' => 'Chronic kidney disease occurs when a disease or condition impairs kidney function, causing kidney damage to worsen over several months or years.'
            ],
        ];

        foreach($doctor_specializations as $doctor_specialization) 
        {
            DoctorSpecialization::create([
                'name' => $doctor_specialization['name'],
                'description' => $doctor_specialization['description'],
            ]);
        }
    }
}
