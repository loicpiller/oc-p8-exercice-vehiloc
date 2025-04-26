<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Car;

class CarFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $carsData = [
            [
                'name' => 'Renault Twingo',
                'description' => null,
                'dailyPrice' => 39.14,
                'monthlyPrice' => 900.00,
                'seats' => 4,
                'manual' => true,
            ],
            [
                'name' => 'Renault Clio',
                'description' => null,
                'dailyPrice' => 38.64,
                'monthlyPrice' => 850.00,
                'seats' => 4,
                'manual' => true,
            ],
            [
                'name' => 'BMW IX (Electric)',
                'description' => "BMW est connu pour ses voitures puissantes et luxueuses - la BMW iX ne fait pas exception. Avec une puissance allant de 326 ch (BMW iX 40) à 523 ch (BMW iX 50) et une autonomie de 408 (BMW iX 40) à 590 kilomètres (BMW iX 50), la BMW iX offre tout ce que l'on peut attendre d'une voiture électrique.",
                'dailyPrice' => 42.40,
                'monthlyPrice' => 950.00,
                'seats' => 4,
                'manual' => true,
            ],
            [
                'name' => 'Renault Zoé',
                'description' => null,
                'dailyPrice' => 39.14,
                'monthlyPrice' => 900.00,
                'seats' => 4,
                'manual' => true,
            ],
            [
                'name' => 'Citroën Ami',
                'description' => null,
                'dailyPrice' => 28.59,
                'monthlyPrice' => 799.00,
                'seats' => 4,
                'manual' => true,
            ],
            [
                'name' => 'Opel Corsa',
                'description' => null,
                'dailyPrice' => 36.38,
                'monthlyPrice' => 820.00,
                'seats' => 4,
                'manual' => true,
            ],
        ];

        foreach ($carsData as $data) {
            $car = new Car();
            $car->setName($data['name']);
            $car->setDescription($data['description']);
            $car->setDailyPrice($data['dailyPrice']);
            $car->setMonthlyPrice($data['monthlyPrice']);
            $car->setSeats($data['seats']);
            $car->setManual($data['manual']);

            $manager->persist($car);
        }

        $manager->flush();
    }
}
