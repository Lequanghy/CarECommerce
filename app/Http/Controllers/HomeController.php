<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\CarType;
use App\Models\FuelType;
use App\Models\Maker;
use App\Models\Model;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $cars = Car::where('published_at', '<', now())
            ->with(['primaryImage', 'city', 'maker', 'model', 'carType', 'fuelType'])
            ->orderBy('published_at', 'desc')
            ->limit(30)
            ->get();

        $makers = Maker::orderBy('name')->get();

        return view('home.index', [
            'cars' => $cars,
            'makers' => $makers,
        ]);
    }
}
