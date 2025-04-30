{{-- Buat isi  menampilkan berita lengkap yang isinya foto, artikel, 
tanggal publish, nama author dll (lanjutan dari page menampilkan berita singkat) --}}

@extends('base.base')

@section('content')
<div class="row my-3">
    <div class="col-md-9">
        <div class="row">
            <div class="col-md-4">
                <img src="{{ asset('storage/' . $news->image) }}" alt="{{ $news->title }}" class="img-fluid">
            </div>
            <div class="col-md-8">
                <h3>{{ $news->title }}</h3>
            @foreach (explode("\n", $news->description) as $paragraph)
                <p>{{ $paragraph }}</p>
            @endforeach            
        </div>
        </div>
    </div>
</div>
@endsection