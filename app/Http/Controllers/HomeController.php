<?php

namespace App\Http\Controllers;
use App\Models\Car;
use App\Models\CarType;
use App\Models\FuelType;
use App\Models\Maker;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {

        return view('home.index');
    }
}

// Select all cars
// $cars = Car::get();
// Select published car
// $cars = Car::where('published_at', '!=', null)->get();
// Select first car
// $car = Car::where('published_at', '!=', null)->first();
// $car = Car::orderBy('published_at', 'desc')->get();

// find car

// $car = Car::find(3);
// $car = new Car();
// $car->maker_id = 1;
// $car->model_id = 1;
// $car->year = 1900;
// $car->price = 123;
// $car->vin = 312;
// $car->mileage = 100;
// $car->car_type_id = 1;
// $car->fuel_type_id = 1;
// $car->user_id = 1;
// $car->city_id = 1;
// $car->address = 'address test';
// $car->phone = 123;
// $car->description = 'lorem pseum';
// $car->published_at = now();
// $car->save();
// $carData = [
//     "maker_id" => 1,
//     "model_id" => 1,
//     "year" => 2020,
//     "price" => 10,
//     "vin" => 123,
//     "mileage" => 100,
//     "car_type_id" => 2,
//     "fuel_type_id" => 1,
//     "user_id" => 1,
//     "city_id" => 1,
//     "address" => 145,
//     "phone" => 123,
//     "description" => 'test car',
//     "published_at" => now(),
// ];

// // approach 1
// $car = Car::create($carData);
// // approach 2
// $car2 = new Car();
// $car2->fill($carData);
// $car2->save();
// // approach 3
// $car3 = new Car($carData);
// $car3->save();
// dump($car);

// Update Car
// $car = CAR::find(1);
// $car->price = 9999;
// $car->save();

// $car = Car::where('published_at', null)
//     ->where('user_id', 1)
//     ->update(['published_at' => now()]);

// $car = CAR::where('price', '>', '20')->get();

// // dump($car);

// $car = Car::where('maker_id', '=', '1')->get();
// dump($car);

// $fuelTypeData = ['name' => 'Electric'];
// $fuelType = FuelType::create($fuelTypeData);
// $fuelType->save();

// $car = Car::find(1);
// $car->price = 15000;

// $car = Car::where('year', '<', '2020')->delete();

// $car = Car::find(1);
// // dd($car->features, $car->primaryImage);
// dd($car->carType);
// $carType = CarType::find(1);
// dd($carType);

// $carType = CarType::where('name', 'Hatchback')->first();
// $car = $carType->cars;
// // $cars = Car::whereBelongsTo($carType)->get();
// dump($car);

// $cars = Car::find(1);
// dd($cars->favouredUsers);

// $maker = Maker::factory()->create();
// dd($maker);

// User::factory()->create([
//     'name' => 'Henry',
// ]);
// Maker::factory()
//     ->count(5)
//     ->hasModels(5)
//     ->create();
// \App\Models\Model::factory()
//     ->count(5)
//     ->forMaker(['name' => 'Honda'])
//     ->create();