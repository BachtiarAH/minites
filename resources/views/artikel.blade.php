@extends('layouts.guest')
@section('artikel')

<main class="container">
    <article>
        <h1 class="text-5xl font-extrabold dark:text-white mb-9">{{$artikel->judul_artikel}}</h1>
        <p>{{$artikel->isi_artikel}}</p>
    </article>
    <section class="mt-10">
        <div class="border rounded p-5">
            <h4 class="text-2xl font-bold dark:text-white">Tambah Komentar</h4>
            <form action="{{route('komentar')}}" method="POST">
                @csrf
                <input type="text" hidden name="id" value="{{$artikel->id}}">
                <x-form.input label="nama" form-id="nama" formName="nama" placeholder="tulis nama anda" type="text" required=true />
                <x-form.input label="email" form-id="email" formName="email" placeholder="tulis email anda" type="email" required=true />
                <x-form.text-area label="komentar" form-id="komentar" name="komentar" placeholder="tulis artikel" />
                <div class="flex justify-end mt-4">
                    <x-utility.button.squared type="submit" variant="primary">POST</x-utility.button.squared>
                </div>
            </form>
        </div>
        <h4 class="text-2xl font-bold dark:text-white">Komentar</h4>

        @foreach($komentar as $key => $value)
        <article class="border-b-2 mt-3">
            <div class="flex items-center mb-1 space-x-4">
                <div class="space-y-1 font-medium dark:text-white">
                    <p>{{$value->nama}} <span class="block text-sm text-gray-500 dark:text-gray-400">{{$value->email}}</span></p>
                </div>
            </div>
            <footer class="mb-2 text-sm text-gray-500 dark:text-gray-400">
                <p>create at <time datetime="{{$value->created_at}}">{{$value->created_at}}</time></p>
            </footer>
            <p class="mb-2 text-gray-500 dark:text-gray-400">{{$value->isi_komentar}}</p>
        </article>
        @endforeach
    </section>
</main>

@endsection
