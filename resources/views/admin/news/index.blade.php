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
                <th>Start Date</th>
                <th>End Date</th>
                <th>Status</th>
                <th>Status Updated At</th>
                <th>Review</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($news as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->title }}</td>
                    <td>{{ $item->created_at->format('d-m-Y') }}</td>
                    <td>{{ $item->start_date }}</td>
                    <td>{{ $item->end_date }}</td>
                    <td>
                        <span class="badge bg-{{ $item->status == 'pending' ? 'warning' : ($item->status == 'approved' ? 'success' : 'danger') }}">
                            {{ ucfirst($item->status) }}
                        </span>
                    </td>
                    <td>
                        @if($item->status != 'pending' && $item->updated_at)
                            {{ $item->updated_at->format('d-m-Y H:i') }}
                        @else
                            -
                        @endif
                    </td>
                    <td>
                        @if ($item->status == 'pending')
                            <a href="{{ route('admin.news.review', $item->id) }}" class="btn btn-primary btn-sm text-white">Review</a>
                        @else
                            <button class="btn btn-secondary btn-sm text-white" disabled>Reviewed</button>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection