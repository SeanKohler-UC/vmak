<?php

namespace App\Http\Controllers;

use App\Car;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CarController extends Controller
{
    /**
     * Return a list of all cars.
     *
     * @return array
     */
    public function index(): array
    {
        return Car::all()->toArray();
    }

    /**
     * Return a list of all cars with defined relationships loaded
     *
     * @param string $with
     * @return array
     */
    public function indexWith(string $with): array
    {
        return Car::with(explode('-', $with))->get()->toArray();
    }

    /**
     * Return a single car.
     *
     * @param Car $car
     * @return Car
     */
    public function show(Car $car): Car
    {
        return $car;
    }

    /**
     * Return a single car with defined relationships loaded
     *
     * @param Car $car
     * @param string $with
     * @return Car
     */
    public function showWith(Car $car, string $with): Car
    {
        $car->load(explode('-', $with));
        return $car;
    }

    /**
     * Store an car.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        $car = Car::create($request->all());

        return response()->json($car, 201);
    }

    /**
     * Update an car.
     *
     * @param Request $request
     * @param Car $car
     * @return JsonResponse
     */
    public function update(Request $request, Car $car): JsonResponse
    {
        $car->update($request->all());

        return response()->json($car, 200);
    }

    /**
     * Delete an car.
     *
     * @param Car $car
     * @return JsonResponse
     * @throws Exception
     */
    public function delete(Car $car): JsonResponse
    {
        $car->delete();

        return response()->json(null, 204);
    }
}
