 @extends('base.base')

@section('title', 'All News')

@section('content')

    @foreach ($news as $item)
        <div class="bg-white p-4 rounded shadow mt-4">
            <h2 class="text-xl font-bold">{{ $item->category }}</h2>
            {{-- <p>{{ Str::limit($item->description, 100) }}</p> --}}
            <p><strong>Title:</strong> {{ $item->title }}</p>
            <p><strong>Event Date:</strong> {{ $item->start_date }}</p>
            <a href="{{ route('news.show', $item->id) }}">
                <button class="btn btn-info text-white px-4 py-2 rounded mt-4 inline-block">Detail</button>
            </a>
        </div>
    @endforeach
@endsection