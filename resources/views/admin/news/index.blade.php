@extends('admin.news.layout')

@section('title', 'Admin Approval Page')

@section('content')

<div class="container mt-4">

    <!-- Approval table -->
    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Created</th>
                <th>Event Date</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($news as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->title }}</td>
                    <td>{{ $item->created_at->format('d-m-Y') }}</td>
                    <td>{{ $item->event_date }}</td>
                    <td>
                        <span class="badge bg-{{ $item->status == 'pending' ? 'warning' : ($item->status == 'approved' ? 'success' : 'danger') }}">
                            {{ ucfirst($item->status) }}
                        </span>
                    </td>
                    <td>
                        @if ($item->status == 'pending')
                            <form action="{{ route('admin.news.approve', $item) }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-success btn-sm">Approve</button>
                            </form>
                            <form action="{{ route('admin.news.reject', $item) }}" method="POST" class="d-inline ms-2">
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm">Reject</button>
                            </form>
                        @else
                            <span class="text-muted">No action</span>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection