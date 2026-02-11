<?php

use Livewire\Component;

new class extends Component
{
   public string $title;

   public string $fromCity;

   public string $fromCountry;

   public string $toCity;

   public string $toCountry;

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

    </form>


</div>
