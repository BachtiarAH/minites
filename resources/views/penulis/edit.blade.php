@extends('layouts.penulis') 
@section('conten')
<x-typography.heading>Edit Artikel</x-typography.heading>
<form action="{{route('penulis.artikel.put')}}" method="POST">
    @method('put')
    @csrf
    <input type="text" hidden name="id" value="{{$artikel->id}}">
    <x-form.input label="Judul" form-id="judul" formName="judul" placeholder="tulis judul" type="text" required=true value="{{$artikel->judul_artikel}}"/>
    <x-form.text-area label="Artikel" form-id="artikel" name="artikel" placeholder="tulis artikel" value="{{$artikel->isi_artikel}}"/>
    <div class="flex justify-end mt-4">
        <x-utility.button.squared type="submit" variant="primary">Update</x-utility.button.squared>
    </div>
</form>
@endsection