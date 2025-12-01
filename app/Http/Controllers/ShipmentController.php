<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewShipmentRequest;
use App\Models\Shipment;
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

        $shipments = Cache::remember($cacheKey, 600,
                fn() => Shipment::where(['status' => Shipment::STATUS_UNASSIGNED])
                ->get()
        );

        return view('shipments.index', compact('shipments'));
    }
//    public function permalink(Shipments $shipment) {
//
//        return view('shipments.permalink', compact('shipment'));
//
//    }

    public function create()
    {
        return view('shipments.create');
    }

    public function store(NewShipmentRequest $request)
    {
        $fileTypes = [
            'application/pdf',
            'application/msword',
            'application/vnd.openxmlformats-officedocument.wordprocessingml.document',

        ];

        foreach($request->documents as $document) {
            if(str_starts_with($document->getMimeType(), 'image/')) {
                dd("slika!");
            }
            elseif(in_array($document->getMimeType(), $fileTypes)) {
                dd("pdf!");
            } else {
                dd("nepoznata vrsta dokumenta!");
            }
        }
        Shipment::create($request->all());
        return redirect()->route('shipments.index')->with('success', 'Shipment created successfully.');
    }

    public function show(Shipment $shipment)
    {

        return view('shipments.show', compact('shipment'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Shipment $shipments)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Shipment $shipments)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Shipment $shipments)
    {
        //
    }
}
