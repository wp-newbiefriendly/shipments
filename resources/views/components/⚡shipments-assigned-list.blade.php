<?php

use Livewire\Component;

new class extends Component
{
    public int $count = 0;

    public int $amount = 1;

    public string $errMsg = "";

    public function increment()
    {
        $this->count += $this->amount;
        $this->errMsg = "";
    }
    public function decrease()
    {
        $result = $this->count - $this->amount;
        if($result >= 0) {
            $this->count -= $this->amount;
        }
        else {
            $this->errMsg = "Invalid math under 0";
        }

    }
};
?>

<div>
     <p>Clicked times: {{ $count }}</p>
    <button wire:click="increment">Increase</button>
    <button wire:click="decrease">Decrease</button>

    <p> {{ $errMsg }}</p>

    <input type="number" min="1" wire:model.live.debounce="amount" />
    <p>Amount: {{ $amount }}</p>
</div>
