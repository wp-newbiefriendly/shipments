<?php

use Livewire\Component;

new class extends Component
{
    public int $count = 0;

    public function increment()
    {
        $this->count++;
    }
};
?>

<div>
     <p>Clicked times: {{ $count }}</p>
    <button wire:click="increment">Click</button>
</div>
