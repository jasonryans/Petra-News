 @extends('base.base')

@section('title', 'All News')

@section('content')

    @foreach ($news as $item)
        <div class="bg-white p-4 rounded shadow mt-4">
            <h2 class="text-xl font-bold">{{ $item->title }}</h2>
            <p>{{ Str::limit($item->description, 100) }}</p>
            <p><strong>Event Date:</strong> {{ $item->event_date }}</p>
        </div>
    @endforeach
@endsection