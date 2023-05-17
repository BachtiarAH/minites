@extends('layouts.app')
@section('body')
<x-penulis.header />
<x-penulis.sidebar />
<div class="p-4 sm:ml-64">
    <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 mt-14">
        @if (session('status') && session('message'))
        <x-utility.alert.border-accent variant="{{session('status')}}" message="{{session('message')}}"></x-utility.alert.border-accent>
        @endif
        @yield('conten')
    </div>
</div>
@endsection