<?php

use Livewire\Component;

new class extends Component
{
   use \Livewire\WithFileUploads;

   public string $title;

   public string $fromCity;

   public string $fromCountry;

   public string $toCity;

   public string $toCountry;

   public int $price;

   public array $statuses = [];
   public string $status = "";

   public int $clientId;

   public array $documents;

   public string $details;

   public string $test;

   public function mount()
   {
       $this->statuses = \App\Models\Shipment::ALLOWED_STATUSES;
   }

   public function validateUser()
   {
       $this->validate([
           'clientId' => '|integer|exists:users,id',
       ]);
   }

   public function submit(\App\Services\ShipmentService $shipmentService)
   {
       $request = new \App\Http\Requests\NewShipmentRequest();

       $data = $this->validate($request->rules());

       $data['from_city'] = $this->fromCity;
       $data['to_city'] = $this->toCity;
       $data['from_country'] = $this->fromCountry;
       $data['to_country'] = $this->toCountry;
       $data['client_id'] = $this->clientId;

       $shipmentService->store($data);
   }

};
?>

<div>
    <div class="container mt-5 mb-5">
        <h2>Create New Shipment</h2>

    <form class="form-container" wire:submit="submit">

        @foreach($errors->all() as $error)
            {{ $error }}
        @endforeach

        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control"
                   wire:model="title" >
        </div>

        <div class="mb-3">
            <label for="from_city" class="form-label">From City</label>
            <input type="text" class="form-control" wire:model="fromCity">
        </div>

        <div class="mb-3">
            <label for="from_country" class="form-label">From Country</label>
            <input type="text" class="form-control" wire:model="fromCountry" >
        </div>

        <div class="mb-3">
            <label for="to_city" class="form-label">To City</label>
            <input type="text" class="form-control" wire:model="toCity" >
        </div>

        <div class="mb-3">
            <label for="to_country" class="form-label">To Country</label>
            <input type="text" class="form-control" wire:model="toCountry" >
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="number" class="form-control" wire:model="price" >
        </div>

        <div class="mb-3">
            <label for="client" class="form-label">Client</label>
            @error('clientId')
            <p>{{ $message }}</p>
            @enderror
            <input type="number" class="form-control" wire:blur="validateUser" wire:model="clientId" >
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select class="form-control" wire:model="status">
                @foreach($statuses as $status)
                    <option value="{{ $status }}">{{ $status }}</option>
                    @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="documents" class="form-label">Documents</label>
            <input type="file" wire:model="documents" class="form-control-file" multiple>
        </div>

        <div class="mb-3">
            <label for="details" class="form-label">Details</label>
            <textarea class="form-control" wire:model="details" ></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Create Shipment</button>

    </form>
    </div>

    </div>
