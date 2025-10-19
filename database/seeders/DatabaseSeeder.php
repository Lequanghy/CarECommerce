<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\FuelType;
use App\Models\State;
use App\Models\User;
use App\Models\CarType;
use App\Models\Maker;
use App\Models\Model;
use App\Models\Car;
use App\Models\CarImage;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\Sequence;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        CarType::factory()
            ->sequence(
                ['name' => 'Sedan',],
                ['name' => 'Hatchback',],
                ['name' => 'SUV',],
                ['name' => 'Pickup Truck',],
                ['name' => 'Mini Van',],
                ['name' => 'Jeep',],
                ['name' => 'Coupe',],
                ['name' => 'Crossover',],
                ['name' => 'Sports Car',],
            )->count(9)->create();

        FuelType::factory()
            ->sequence(
                ['name' => 'Petrol',],
                ['name' => 'Diesel',],
                ['name' => 'Electric',],
                ['name' => 'Hybrid',],
                ['name' => 'CNG',],
            )->count(5)->create();
        $states = [
            'California' => ['Los Angeles', 'San Francisco', 'San Diego', 'Sacramento', 'San Jose', 'Fresno', 'Long Beach', 'Oakland', 'Bakersfield', 'Anaheim'],
            'Texas' => ['Houston', 'Dallas', 'Austin', 'San Antonio', 'Fort Worth', 'El Paso', 'Arlington', 'Corpus Christi', 'Plano', 'Lubbock'],
            'Florida' => ['Miami', 'Orlando', 'Tampa', 'Jacksonville', 'Tallahassee', 'Fort Lauderdale', 'West Palm Beach', 'Gainesville', 'Sarasota', 'Pensacola'],
            'New York' => ['New York City', 'Buffalo', 'Rochester', 'Albany', 'Syracuse', 'Yonkers', 'Binghamton', 'Utica', 'Schenectady', 'Troy'],
            'Illinois' => ['Chicago', 'Springfield', 'Peoria', 'Naperville', 'Rockford', 'Joliet', 'Aurora', 'Elgin', 'Waukegan', 'Cicero'],
            'Pennsylvania' => ['Philadelphia', 'Pittsburgh', 'Harrisburg', 'Allentown', 'Erie', 'Reading', 'Scranton', 'Bethlehem', 'Lancaster', 'York'],
            'Ohio' => ['Columbus', 'Cleveland', 'Cincinnati', 'Toledo', 'Akron', 'Dayton', 'Youngstown', 'Lorain', 'Hamilton', 'Mansfield'],
            'Michigan' => ['Detroit', 'Grand Rapids', 'Warren', 'Sterling Heights', 'Lansing', 'Ann Arbor', 'Flint', 'Dearborn', 'Livonia', 'Troy'],
            'Georgia' => ['Atlanta', 'Augusta', 'Columbus', 'Savannah', 'Athens', 'Macon', 'Roswell', 'Albany', 'Valdosta', 'Sandy Springs'],
            'North Carolina' => ['Charlotte', 'Raleigh', 'Greensboro', 'Durham', 'Winston-Salem', 'Fayetteville', 'Cary', 'High Point', 'As heville', 'Concord'],
        ];

        foreach ($states as $state => $cities) {
            State::factory()
                ->state(['name' => $state])
                ->has(
                    City::factory()
                        ->count(count($cities))
                        ->sequence(...array_map(fn($city) => ['name' => $city], $cities))
                )->create();
        }
        ;
        $maker = [
            'Toyota' => ['Corolla', 'Camry', 'RAV4', 'Highlander', 'Prius', '4Runner', 'Tacoma', 'Tundra', 'Sienna', 'Venza'],
            'Honda' => ['Civic', 'Accord', 'CR-V', 'Pilot', 'Fit', 'HR-V', 'Odyssey', 'Ridgeline', 'Insight', 'Passport'],
            'Ford' => ['F-150', 'Escape', 'Explorer', 'Mustang', 'Edge', 'Ranger', 'Bronco', 'Expedition', 'Fusion', 'EcoSport'],
            'Chevrolet' => ['Silverado', 'Equinox', 'Malibu', 'Traverse', 'Colorado', 'Tahoe', 'Suburban', 'Camaro', 'Blazer', 'Trax'],
            'Nissan' => ['Altima', 'Sentra', 'Rogue', 'Murano', 'Pathfinder', 'Frontier', 'Titan', 'Versa', 'Juke', 'Kicks'],
            'BMW' => ['3 Series', '5 Series', 'X3', 'X5', 'X1', '7 Series', 'Z4', 'M3', 'M5', 'i3'],
            'Mercedes-Benz' => ['C-Class', 'E-Class', 'GLC', 'GLE', 'A-Class', 'S-Class', 'GLA', 'CLA', 'G-Class', 'SL'],
            'Audi' => ['A3', 'A4', 'A6', 'Q5', 'Q7', 'A5', 'A7', 'Q3', 'TT', 'e-tron'],
            'Volkswagen' => ['Golf', 'Passat', 'Tiguan', 'Jetta', 'Atlas', 'Beetle', 'Arteon', 'ID.4', 'Polo', 'Touareg'],
        ];

        foreach ($maker as $make => $models) {
            Maker::factory()
                ->state(['name' => $make])
                ->has(
                    Model::factory()
                        ->count(count($models))
                        ->sequence(...array_map(fn($model) => ['name' => $model], $models))
                )->create();
        }

        User::factory()->count(3)->create();

        User::factory()
            ->count(2)
            ->has(
                Car::factory()
                    ->count(50)
                    ->has(
                        CarImage::factory()
                            ->count(5)
                            ->sequence(
                                fn(Sequence $sequence) =>
                                ['position' => $sequence->index % 5 + 1]
                            ),
                        'images'
                    )
                    ->hasFeatures(),
                "favouriteCars"
            )
            ->create();

    }
}