<?php

namespace App\Http\Controllers;

use App\Address;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    /**
     * Return a list of all addresses.
     *
     * @return array
     */
    public function index(): array
    {
        return Address::all()->toArray();
    }

    /**
     * Return a list of all addresses with defined relationships loaded
     *
     * @param string $with
     * @return array
     */
    public function indexWith(string $with): array
    {
        return Address::with(explode('-', $with))->get()->toArray();
    }

    /**
     * Return a single address.
     *
     * @param Address $address
     * @return Address
     */
    public function show(Address $address): Address
    {
        return $address;
    }

    /**
     * Return a single address with defined relationships loaded
     *
     * @param Address $address
     * @param string $with
     * @return Address
     */
    public function showWith(Address $address, string $with): Address
    {
        $address->load(explode('-', $with));
        return $address;
    }

    /**
     * Store an address.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        $address = Address::create($request->all());

        return response()->json($address, 201);
    }

    /**
     * Update an address.
     *
     * @param Request $request
     * @param Address $address
     * @return JsonResponse
     */
    public function update(Request $request, Address $address): JsonResponse
    {
        $address->update($request->all());

        return response()->json($address, 200);
    }

    /**
     * Delete an address.
     *
     * @param Address $address
     * @return JsonResponse
     * @throws Exception
     */
    public function delete(Address $address): JsonResponse
    {
        $address->delete();

        return response()->json(null, 204);
    }
}
