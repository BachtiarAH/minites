<div style="text-align: center">
    <button wire:click="increment" wire:loadi=>+</button>
    <h1>{{ $count }}</h1>
    <h2>{{$data}}</h2>
    <input wire:model.lazy="message" type="text">
    <h1>{{ $message }}</h1>
</div>