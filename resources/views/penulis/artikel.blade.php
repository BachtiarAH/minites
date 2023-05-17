@extends('layouts.penulis')
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
                        <a href="{{route('penulis.artikel.edit',['id'=>$value->id])}}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                        <button data-id="{{$value->id}}" onclick="setDelete(this)" class="font-medium text-red-600 dark:text-red-500 hover:underline" data-modal-target="popup-modal" data-id="{{$value->id}}" data-modal-toggle="popup-modal">delete</button>
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>

</main>


<div id="popup-modal" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-md max-h-full">
        <form action="{{route('penulis.artikel.delete')}}" method="POST">
            @csrf
            @method('delete')
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-hide="popup-modal">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="p-6 text-center">
                <svg aria-hidden="true" class="mx-auto mb-4 text-gray-400 w-14 h-14 dark:text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Apakah and yakin ingin menghapus artikel ini?</h3>
                
                    <input type="text" id="input" name="id" hidden>
                    <button data-modal-hide="popup-modal" type="submit" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                        Yes, I'm sure
                    </button>
                
                <button data-modal-hide="popup-modal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No, cancel</button>
            </div>
        </div>
        </form>
    </div>
</div>

<script>
    function setDelete(params) {
        id = params.getAttribute("data-id")
        input =  document.getElementById("input");
        input.value = id;
    }
</script>

@endsection
