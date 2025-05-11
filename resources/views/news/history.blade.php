@extends('base.base')

@section('title', 'News Submission History')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Your News Submission History</h2>
    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Submitted At</th>
                <th>Status</th>
                <th>Reason</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($news as $item)
                <tr> 
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->title }}</td>
                    <td>{{ $item->created_at->format('d-m-Y H:i') }}</td>
                    <td>
                        <span class="badge bg-{{ $item->status == 'pending' ? 'warning' : ($item->status == 'approved' ? 'success' : 'danger') }}">
                            {{ ucfirst($item->status) }}
                        </span>
                    </td>
                    <td>
                        @if($item->status == 'rejected')
                            {{ $item->rejection_memo ?? '-' }}
                        @else
                            -
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('news.viewSubmission', $item->id) }}" class="btn btn-info btn-sm text-white">View</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection