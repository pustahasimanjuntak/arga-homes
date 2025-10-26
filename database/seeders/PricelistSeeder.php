<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pricelist;

class PricelistSeeder extends Seeder
{
    public function run(): void
    {
        $pricelists = [
            [
                'service_name' => 'Haircut Basic',
                'description' => 'Potong rambut standar dengan hasil rapi dan profesional',
                'price' => 35000,
                'duration' => 30,
                'is_active' => true,
            ],
            [
                'service_name' => 'Haircut Premium',
                'description' => 'Potong rambut premium dengan styling dan konsultasi gaya rambut',
                'price' => 50000,
                'duration' => 45,
                'is_active' => true,
            ],
            [
                'service_name' => 'Haircut + Hair Wash',
                'description' => 'Potong rambut dilengkapi dengan cuci rambut menggunakan shampo premium',
                'price' => 45000,
                'duration' => 40,
                'is_active' => true,
            ],
            [
                'service_name' => 'Hair Coloring',
                'description' => 'Pewarnaan rambut dengan berbagai pilihan warna sesuai keinginan',
                'price' => 150000,
                'duration' => 90,
                'is_active' => true,
            ],
            [
                'service_name' => 'Beard Trimming',
                'description' => 'Perawatan dan rapikan jenggot dengan hasil maksimal',
                'price' => 25000,
                'duration' => 20,
                'is_active' => true,
            ],
            [
                'service_name' => 'Complete Package',
                'description' => 'Paket lengkap: Haircut + Hair Wash + Beard Trimming + Styling',
                'price' => 80000,
                'duration' => 60,
                'is_active' => true,
            ],
        ];

        foreach ($pricelists as $pricelist) {
            Pricelist::create($pricelist);
        }

        echo "Pricelist data created successfully!\n";
    }
}