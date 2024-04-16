<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Car;
use App\Models\Cbrand;
use App\Models\Client;
use App\Models\Cmodel;
use App\Models\Host;
use App\Models\Image;
use App\Models\Offer;
use App\Models\User;
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

        $usersData = [
            [
                'CIN' => 'CD123456',
                'first_name' => 'Youssra',
                'last_name' => 'Benmimoun',
                'email' => 'youssra.benmimou@gmail.com',
                'password' => '123',
                'type' => 'user',
                'address' => 'bit',
                'telephone' => '0123456789',
                'city' => 'Tanger',
                'country' => 'Maroc',
                'birth_date' => '1998-08-11'
            ],
            
            [
                'CIN' => 'CD654321',
                'first_name' => 'Aida',
                'last_name' => 'Benmimoun',
                'email' => 'aida.benmimou@gmail.com',
                'password' => '123',
                'type' => 'user',
                'address' => 'bit',
                'telephone' => '0123456789',
                'city' => 'Tanger',
                'country' => 'Maroc',
                'birth_date' => '2000-06-06'
            ],
            
        ];

        foreach ($usersData as $userData) {
            User::create($userData);
        }

        $hostsData = [
            [
                'user_id' => 1
            ]
            
        ];

        foreach ($hostsData as $hostData) {
            Host::create($hostData);
        }

        
        $offersData = [
            [
                'description' => "description",
                'type' => 'car 1',
                'host_id' => 1,
                'car_id' => 1
            ],
            
            [
                'description' => "description",
                'type' => 'car 2',
                'host_id' => 1,
                'car_id' => 2
            ],
            
        ];

        foreach ($offersData as $offerData) {
            Offer::create($offerData);
        }

        $clientsData = [
            [
                'user_id' => 2
            ]
            
        ];

        foreach ($clientsData as $clientData) {
            Client::create($clientData);
        }

        $imagesData = [
            [
                'url' => '/assets/polestar-1.jpg',
                'offer_id' => 1,
            ],
            [
                'url' => '/assets/car2.jpg',
                'offer_id' => 2,
            ]
            
        ];

        foreach ($imagesData as $imageData) {
            Image::create($imageData);
        }
    }
}
