<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBrokerRequest;
use App\Http\Resources\BrokersResource;
use App\Models\Broker;
use Illuminate\Http\Request;

class BrokersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return BrokersResource::collection(Broker::all());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBrokerRequest $request)
    {
        $request->validated();

        $broker = Broker::create([
            'name' => $request->name,
            'address' => $request->address,
            'city' => $request->city,
            'zip_code' => $request->zip_code,
            'phone_number' => $request->phone_number,
            'logo_path' => $request->logo_path
        ]);

        return new BrokersResource($broker);
    }

    /**
     * Display the specified resource.
     */
    public function show(Broker $broker)
    {
        return new BrokersResource($broker);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Broker $broker)
    {
        $broker->update($request->only([
            'name',
            'address',
            'city',
            'zip_code',
            'phone_number',
            'logo_path'
        ]));

        return new BrokersResource($broker);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
