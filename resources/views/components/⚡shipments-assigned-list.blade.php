<?php

use Livewire\Component;

new class extends Component
{
    public int $count = 0;

    public function increment()
    {
        $this->count++;
    }
    public function decrease()
    {
        $minCount = 0;
        if($this->count > $minCount) {
            $this->count--;
        }
    }
};
?>

<div>
     <p>Clicked times: {{ $count }}</p>
    <button wire:click="increment">Increase</button>
    <button wire:click="decrease">Decrease</button>
</div>
