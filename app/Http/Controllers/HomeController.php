<?php

namespace App\Http\Controllers;
use App\Models\Car;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Select all cars
        // $cars = Car::get();
        // Select published car
        // $cars = Car::where('published_at', '!=', null)->get();
        // Select first car
        // $car = Car::where('published_at', '!=', null)->first();

        $car = Car::orderBy('published_at', 'desc')->get();

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
        // $carData = [];
        // // approach 1
        // $car = Car::create($carData);

        // // approach 2
        // $car2 = new Car();
        // $car2->fill($carData);
        // $car2->save();

        // // approach 3
        // $car3 = new Car($carData);
        // $car3->save();


        dump($car);
        return view('home.index');
    }
}