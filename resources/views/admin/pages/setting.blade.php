@extends('layouts.admin')
@section('conten')
<x-typography.heading>Setting</x-typography.heading>
<div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
    <div class="px-6 py-6 lg:px-8">
        <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Tambah Admin</h3>
        <form class="space-y-6" action="{{route('admin.setting.profil')}}" method="POST">
            @csrf
            @method('put')
            <div>
                <label for="username1" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">username</label>
                <input type="text" name="username" id="username1" value="{{$profil->username}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="username" required>
            </div>
            <div>
                <label for="password1" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">password</label>
                <input type="password" name="password" id="password1" value="{{$profil->password}}" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
            </div>
            <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
        </form>
    </div>
</div>
@endsection