<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Car;
use App\Models\Cbrand;
use App\Models\Cmodel;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $cbrandsData = [
            [
                'name' => 'Brand 1',
            ],
            
            [
                'name' => 'Brand 2',
            ],
        ];

        foreach ($cbrandsData as $cbrandData) {
            Cbrand::create($cbrandData);
        }

        $cmodelsData = [
            [
                'name' => 'Modèle 1',
                'cbrand_id' => 1, 
            ],
            
            [
                'name' => 'Modèle 2',
                'cbrand_id' => 2,
            ],
        ];

        foreach ($cmodelsData as $cmodelData) {
            Cmodel::create($cmodelData);
        }

        $carsData = [
            [
                'price_per_day' => 50.00,
                'production_date' => '2022-01-01',
                'fuel' => 'Essence',
                'nbr_places' => 5,
                'description' => 'Une voiture spacieuse et confortable.',
                'cmodel_id' => 1,
            ],
            [
                'price_per_day' => 60.00,
                'production_date' => '2021-05-15',
                'fuel' => 'Diesel',
                'nbr_places' => 4,
                'description' => 'Une voiture économique et fiable.',
                'cmodel_id' => 2,
            ],
        ];

        foreach ($carsData as $carData) {
            Car::create($carData);
        }



    }
}
