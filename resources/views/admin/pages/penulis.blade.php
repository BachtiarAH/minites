@extends('layouts.admin')
@section('conten')
<x-typography.heading>Penulis</x-typography.heading>
<main>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table id="table-artikel" class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th hidden>id</th>
                    <th scope="col" class="px-6 py-3">
                        username
                    </th>
                    <th scope="col" class="px-6 py-3">
                        status
                    </th>
                    <th scope="col" class="px-6 py-3">
                    </th>
                </tr>
            </thead>
            <tbody>

                {{-- {{dd($penulis[0])}} --}}
                @foreach($penulis as $key => $value)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <td hidden>{{$value->id}}</td>
                    <td class="px-6 py-4">
                        {{$value->username}}
                    </td>
                    <td class="px-6 py-4">
                        {{$value->status}}
                    </td>
                    <td class="px-6 py-4 text-right">
                        <button onclick="setEdit(this)" class="font-medium text-blue-600 dark:text-blue-500 hover:underline" data-modal-target="edit" data-modal-toggle="edit">Edit</button>
                        <a href="#" class="font-medium text-red-600 dark:text-red-500 hover:underline">Delete</a>
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>



</main>



<x-utility.modal.modal modal-id="edit">
    <div class="p-5">
        <h2 class="text-2xl  capitalize">edit data penulis</h2>
        <form id="form-edit" class="flex flex-col justify-end" action="" method="POST">
            @method('put')
            @csrf
            <input type="text" name="id" hidden>
            <x-form.input form-id="username" label="Username" required=true type="text" form-name="username" placeholder="" />

            <div class="mb-4">
                <label for="status" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status</label>
                <select id="status" name="status" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option value='aktif' selected>aktif</option>
                    <option value='tidak aktif'>tidak aktif</option>
                </select>
            </div>

            <x-utility.button.squared type="submit" variant="primary">Update</x-untility.button.squared>

        </form>
    </div>
</x-utility.modal.modal>

<script>
    function setEdit(params) {
        tr = params.parentElement.parentElement;
        data = getDatafromTr(tr);
        inputId = document.getElementsByName("id")[0];
        inputUsername = document.getElementsByName("username")[0];
        inputStatus = document.getElementsByName('status')[0];

        inputId.value = data[0];
        inputUsername.value = data[1];
        inputStatus.value = data[2];

    }

</script>
@endsection
