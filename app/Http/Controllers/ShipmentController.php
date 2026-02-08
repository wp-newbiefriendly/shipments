<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewShipmentRequest;
use App\Http\Requests\UpdateShipmentRequest;
use App\Models\Shipment;
use App\Models\ShipmentDocuments;
use App\Traits\ImageUploadTrait;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Gate;

class ShipmentController extends Controller
{
    use ImageUploadTrait;

    public function index()
    {
//        Cache::forget('shipments_unassigned');
        $shipments = Cache::remember('shipments_unassigned', 600,
        fn() => Shipment::UnassignedShipment()->get()
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
        Gate::authorize('canViewCreationPage', Shipment::class);
        return view('shipments.create');
    }

    public function store(NewShipmentRequest $request)
    {

        Gate::authorize('create', Shipment::class);

        $shipment = Shipment::create($request->all());

        $fileTypes = [
            'application/pdf',
            'application/msword',
            'application/vnd.openxmlformats-officedocument.wordprocessingml.document',

        ];

        foreach($request->documents as $document) {
            if(str_starts_with($document->getMimeType(), 'image/')) {

                $name = $this->uploadImage($document, "documents/$shipment->id");

                $name = $shipment->id."/".$name;

                ShipmentDocuments::create([
                    'shipment_id' => $shipment->id,
                    'document_name' => $name
                ]);
            }
            elseif(in_array($document->getMimeType(), $fileTypes)) {

                $extension = $document->getClientOriginalExtension();

                $fileName = uniqid().'.'.$extension;

                $path = $document->storeAs("documents/{$shipment->id}", $fileName, 'public');

                ShipmentDocuments::create([
                    'shipment_id' => $shipment->id,
                    'document_name' => $path
                ]);
            }
        }

        return redirect()->route('shipments.index')->with('success', 'Shipment created successfully.');
    }

    public function show(Shipment $shipment)
    {
        Gate::authorize('view', $shipment);

        return view('shipments.show', compact('shipment'));

    }

    public function edit(Shipment $shipment)
    {
        Gate::authorize('canViewEdit', Shipment::class);
        return view('shipments.edit', compact('shipment'));
    }

    public function update(UpdateShipmentRequest $request, Shipment $shipment)
    {
        $shipment->update($request->validated());
        return redirect()->back()->with('success', 'Shipment updated successfully.');
    }
//        Cache::forget('shipments_unassigned');
//        Cache::put('shipments_unassigned', Shipment::where('status', Shipment::STATUS_UNASSIGNED)->get(), 600);
//
//        // Obradi dokumente kao u store metodi
//        if ($request->has('documents')) {
//            $fileTypes = [
//                'application/pdf',
//                'application/msword',
//                'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
//            ];
//
//            foreach ($request->documents as $document) {
//                if (str_starts_with($document->getMimeType(), 'image/')) {
//                    $name = $this->uploadImage($document, "documents/$shipment->id");
//                    $name = $shipment->id . "/" . $name;
//
//                    ShipmentDocuments::create([
//                        'shipment_id' => $shipment->id,
//                        'document_name' => $name,
//                    ]);
//                } elseif (in_array($document->getMimeType(), $fileTypes)) {
//                    $extension = $document->getClientOriginalExtension();
//                    $fileName = uniqid() . '.' . $extension;
//                    $path = $document->storeAs("documents/{$shipment->id}", $fileName, 'public');
//
//                    ShipmentDocuments::create([
//                        'shipment_id' => $shipment->id,
//                        'document_name' => $path,
//                    ]);
//                }
//            }
//        }

//        return redirect()->route('shipments.index')->with('success', 'Shipment updated successfully.');
//    }

    public function destroy(Shipment $shipment)
    {
        $shipment->delete();

        Cache::forget('shipments_unassigned');

        return redirect()->route('shipments.index')->with('success', 'Shipment deleted successfully');
    }

    public function assignUser(Request $request, Shipment $shipment): RedirectResponse
    {
        $request->validate(['user_id' => 'required|exists:users,id']);

        $shipment->user_id = $request->user_id;
        $shipment->status = Shipment::STATUS_IN_PROGRESS;
        $shipment->save();


        return redirect()->back();
    }

}
