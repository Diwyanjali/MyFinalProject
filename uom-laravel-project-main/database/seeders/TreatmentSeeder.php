<?php

namespace Database\Seeders;

use App\Models\Treatment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TreatmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $treatments = [
            [
                'name' => 'Abhyanga massage',
                'description' => "Abhyanga is a massage that's done with warm oil. The oil is applied on the entire body, from the scalp to the soles of your feet.",
                'status' => 1
            ],
            [
                'name' => 'Kati vasti treatment',
                'description' => "Kati Vasti is performed using medicated oils, followed by a gentle, targeted massage to soothe inflamed tissues, release muscle knots and relieve pain and stiffness",
                'status' => 1
            ],
            [
                'name' => 'Elakizhi treatment',
                'description' => 'Elakizhi Ayurveda treatment is one of the best Ayurvedic therapies that help people with back pain, joint pain, stiffness in the muscles, and muscle spasms.',
                'status' => 1
            ],
            [
                'name' => 'Njavara kizhi treatment',
                'description' => 'Navara Kizhi is an Ayurvedic treatment used to nourish and strengthen the joints, muscles and soft tissue while providing relief from pain.',
                'status' => 1
            ],
            [
                'name' => 'Hair care treatment',
                'description' => 'hair care treatment involves Keratin smoothing treatment, Scalp treatment, Hot oil treatment, Moisture treatment, Detox treatment, Relaxer treatment, Toning treatment, Hair gloss treatment',
                'status' => 1
            ],
            [
                'name' => 'Skin treatment',
                'description' => 'Skin care treatments include cleansing, exfoliation (scrubs), moisturizing, acne treatments, and face masks.',
                'status' => 1
            ],
            [
                'name' => 'Herbal pool',
                'description' => 'Herbal pool is a bathing water pool .its good for skin and other diseases',
                'status' => 1
            ],
            [
                'name' => 'Fish therapy',
                'description' => 'Fish pedicures are a type of foot treatment that aims to give people soft skin. The purported benefits of fish pedicures include reduced callouses, smooth skin on the feet, and exfoliation of dry skin and rough patches.',
                'status' => 1
            ],
        ];

        foreach($treatments as $treatment)
        {
            Treatment::create([
                'name' => $treatment['name'],
                'description' => $treatment['description'],
                'status' => $treatment['status']
            ]);
        }
    }
}
