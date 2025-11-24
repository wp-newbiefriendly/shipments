<?php

namespace App\Http\Controllers;

use App\Models\Shipments;
use Illuminate\Http\Request;

class ShipmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('shipments.index', [
            'shipments' => Shipments::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('shipments.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validacija podataka sa forme
        $request->validate([
            'title' => 'required|string|max:255',
            'from_city' => 'required|string|max:255',
            'from_country' => 'required|string|max:255',
            'to_city' => 'required|string|max:255',
            'to_country' => 'required|string|max:255',
            'price' => 'required|numeric',
            'status' => 'required|string',
            'user_id' => 'required|exists:users,id', // Ako korisnik postoji
            'details' => 'nullable|string',
        ]);

        // Kreiraj novu pošiljku
        Shipment::create([
            'title' => $request->title,
            'from_city' => $request->from_city,
            'from_country' => $request->from_country,
            'to_city' => $request->to_city,
            'to_country' => $request->to_country,
            'price' => $request->price,
            'status' => $request->status,
            'user_id' => $request->user_id,
            'details' => $request->details,
        ]);

        // Preusmeri korisnika i prikaži poruku o uspehu
        return redirect()->route('shipments.index')->with('success', 'Shipment created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Shipments $shipments)
    {
        //
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
