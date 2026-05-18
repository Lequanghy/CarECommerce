<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cars = $this
            ->currentUser()
            ->cars()
            ->with(['primaryImage', 'maker', 'model'])
            ->orderBy('created_at', 'desc')
            ->paginate(5);

        return view('car.index', ['cars' => $cars]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('car.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Car $car)
    {
        return view('car.show', ['car' => $car]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Car $car)
    {
        abort_unless($car->user_id === $this->currentUser()->id, 403);

        return view('car.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Car $car)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Car $car)
    {
        //
    }

    public function search(Request $request)
    {
        $query = Car::where('published_at', '<', now())
            ->with(['primaryImage', 'city', 'maker', 'model', 'carType', 'fuelType'])
            ->orderBy('published_at', 'desc');

        if ($request->filled('maker_id')) {
            $query->where('maker_id', $request->input('maker_id'));
        }

        if ($request->filled('model_id')) {
            $query->where('model_id', $request->input('model_id'));
        }

        if ($request->filled('car_type_id')) {
            $query->where('car_type_id', $request->input('car_type_id'));
        }

        if ($request->filled('fuel_type_id')) {
            $query->where('fuel_type_id', $request->input('fuel_type_id'));
        }

        if ($request->filled('state_id')) {
            $query->where('state_id', $request->input('state_id'));
        }

        if ($request->filled('city_id')) {
            $query->where('city_id', $request->input('city_id'));
        }

        if ($request->filled('year_from')) {
            $query->where('year', '>=', $request->input('year_from'));
        }

        if ($request->filled('year_to')) {
            $query->where('year', '<=', $request->input('year_to'));
        }

        if ($request->filled('price_from')) {
            $query->where('price', '>=', $request->input('price_from'));
        }

        if ($request->filled('price_to')) {
            $query->where('price', '<=', $request->input('price_to'));
        }

        if ($request->filled('mileage')) {
            $query->where('mileage', '<=', $request->input('mileage'));
        }

        $cars = $query->paginate(15)->withQueryString();

        return view('car.search', ['cars' => $cars]);
    }

    public function watchlist()
    {
        $cars = $this
            ->currentUser()
            ->favouriteCars()
            ->with(['primaryImage', 'city', 'maker', 'model', 'carType', 'fuelType'])
            ->paginate(15);

        return view('car.watchlist', ['cars' => $cars]);
    }

    private function currentUser()
    {
        return auth()->user();
    }
}