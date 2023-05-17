@extends('layouts.penulis') 
@section('conten')
    <x-typography.heading>Buat Artikel</x-typography.heading>
    <form action="{{route('penulis.artikel.post')}}" method="POST">
        @csrf
        <x-form.input label="Judul" form-id="judul" formName="judul" placeholder="tulis judul" type="text" required=true/>
        <x-form.text-area label="Artikel" form-id="artikel" name="artikel" placeholder="tulis artikel"/>
        <div class="flex justify-end mt-4">
            <x-utility.button.squared type="submit" variant="primary">POST</x-utility.button.squared>
        </div>
    </form>
    
@endsection