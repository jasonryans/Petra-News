<h1>All News</h1>

<a href="{{ route('news.create') }}">Buat News Baru</a>

@foreach ($news as $item)
    <div>
        <h2>{{ $item->title }}</h2>
        <p>{{ Str::limit($item->description, 100) }}</p>
        <p><strong>Event Date:</strong> {{ $item->event_date }}</p>
    </div>
@endforeach
