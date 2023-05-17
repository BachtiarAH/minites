@extends('layouts.admin')
@section('conten')
<x-typography.heading>Artikel</x-typography.heading>
<main>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table id="table-artikel" class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Judul
                    </th>
                    <th scope="col" class="px-6 py-3">
                        penulis
                    </th>
                    <th scope="col" class="px-6 py-3">
                        tanggal
                    </th>
                    <th scope="col" class="px-6 py-3">
                    </th>
                </tr>
            </thead>
            <tbody>
                {{-- {{dd($artikels)}} --}}
                @foreach($artikels as $key => $value)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <td class="px-6 py-4">
                        {{$value->judul}}
                    </td>
                    <td class="px-6 py-4">
                        {{$value->penulis}}
                    </td>
                    <td class="px-6 py-4">
                        {{$value->tanggal}}
                    </td>
                    <td class="px-6 py-4 text-right">
                        <a href="{{route('artikel',['id'=>$value->id])}}" target="blank" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">show Artikel</a>
                    </td>
                </tr>
                @endforeach
                
            </tbody>
        </table>
    </div>

</main>


@endsection
