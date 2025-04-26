<h1>Admin Approval Page</h1>

@foreach ($news as $item)
    <div>
        <p>ID: {{ $item->id }}</p>
        <p>Title: {{ $item->title }}</p>
        <p>Created: {{ $item->created_at->format('d-m-Y') }}</p>
        <p>Event: {{ $item->event_date }}</p>
        <p>Status: {{ $item->status }}</p>

        @if ($item->status == 'pending')
            <form action="{{ route('admin.news.approve', $item) }}" method="POST" style="display:inline;">
                @csrf
                <button type="submit">Approve</button>
            </form>
            <form action="{{ route('admin.news.reject', $item) }}" method="POST" style="display:inline;">
                @csrf
                <button type="submit">Reject</button>
            </form>
        @endif
    </div>
@endforeach
