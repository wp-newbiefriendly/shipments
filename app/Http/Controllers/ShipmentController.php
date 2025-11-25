<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewShipmentRequest;
use App\Models\Shipments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class ShipmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cacheKey = 'shipments_unassigned';

        $shipments = Cache::remember($cacheKey, 600, function () {
            return Shipments::where('status', Shipments::STATUS_UNASSIGNED)
                ->orderBy('created_at', 'desc')
                ->get();
        });

        return view('shipments.index', compact('shipments'));
    }
    public function permalink(Shipments $shipment) {

        return view('shipments.permalink', compact('shipment'));

    }

    public function create()
    {
        return view('shipments.create');
    }

    public function store(NewShipmentRequest $request)
    {
        Shipments::create($request->all());
        return redirect()->route('shipments.index')->with('success', 'Shipment created successfully.');
    }

    public function show(Shipments $shipments)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Shipments $shipments)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Shipments $shipments)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Shipments $shipments)
    {
        //
    }
}
