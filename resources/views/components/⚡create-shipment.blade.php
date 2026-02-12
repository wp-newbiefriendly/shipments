<?php

use Livewire\Component;

new class extends Component
{
   public string $title;

   public string $fromCity;

   public string $fromCountry;

   public string $toCity;

   public string $toCountry;

   public int $price;

   public array $statuses = [];
   public string $status = "";

   public int $clientId;

   public string $clientError;

   public function mount()
   {
       $this->statuses = \App\Models\Shipment::ALLOWED_STATUSES;
   }

   public function validateUser()
   {
       $this->validate([
           'clientId' => 'required|integer|exists:users,id',
       ]);
   }

};
?>

<div>

    <form>
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control"
                   wire:model="title" required>
        </div>

        <div class="mb-3">
            <label for="from_city" class="form-label">From City</label>
            <input type="text" class="form-control" wire:model="fromCity" required>
        </div>

        <div class="mb-3">
            <label for="from_country" class="form-label">From Country</label>
            <input type="text" class="form-control" wire:model="fromCountry" required>
        </div>

        <div class="mb-3">
            <label for="to_city" class="form-label">To City</label>
            <input type="text" class="form-control" wire:model="toCity" required>
        </div>

        <div class="mb-3">
            <label for="to_country" class="form-label">To Country</label>
            <input type="text" class="form-control" wire:model="toCountry" required>
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="number" class="form-control" wire:model="price" required>
        </div>

        <div class="mb-3">
            <label for="client" class="form-label">Client</label>
            @error('clientId')
            <p>{{ $message }}</p>
            @enderror
            <input type="number" class="form-control" wire:blur="validateUser" wire:model="clientId" required>
        </div>

        <div class="form-group">
            <select wire:model="status">
                @foreach($statuses as $status)
                    <option value="{{ $status }}">{{ $status }}</option>
                    @endforeach
            </select>
        </div>

    </form>


</div>
