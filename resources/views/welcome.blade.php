@extends('layouts.guest')
@section('artikel')

{{-- {{dd($artikel[0])}} --}}
<main class="container">
    <input wire:model="message" type="text" placeholder="asdjfjk">
    <article class="flex flex-wrap gap-5 justify-center">
        <livewire:counter /> 
        @foreach($artikel as $key => $value)
        <a href="{{route('artikel',['id'=>$value->id])}}" class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{$value->judul_artikel}}</h5>
            <p class="font-normal line-clamp-2 text-gray-700 dark:text-gray-400 ">{{$value->isi_artikel}}</p>
        </a>
        @endforeach

    </article>
</main>

@endsection
