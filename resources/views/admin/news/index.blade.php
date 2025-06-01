@extends('admin.news.layout')

@section('title', 'Admin Approval Page')

@section('content')

<style>
    .custom-toggle-container {
        position: relative;
        display: inline-flex;
        border: 2px solid #c1c4c7;
        border-radius: 10px;
        overflow: hidden;
        background-color: #e1e3e6;
        width: 200px;
    }

    .custom-toggle {
        background-color: transparent;
        color: #969a9e;
        padding: 8px 16px;
        font-weight: 500;
        cursor: pointer;
        border: none;
        outline: none;
        flex: 1;
        text-align: center;
        z-index: 1;
        transition: color 0.3s ease;
    }

    .custom-toggle.active {
        color: #FFFFFF;
    }

    .custom-toggle-container input[type="radio"] {
        display: none;
    }

    .toggle-slider {
        position: absolute;
        top: 0;
        left: 0;
        width: 50%;
        height: 100%;
        background-color: #06498c;
        transition: transform 0.3s ease;
        border-radius: 3px;
    }

    .custom-toggle-container input#status_approved:checked ~ .toggle-slider {
        transform: translateX(100%);
    }

    .custom-toggle-container input#status_pending:checked ~ .toggle-slider {
        transform: translateX(0);
    }
</style>

<div class="container mt-4">
    <!-- Custom Toggle Button Group -->
    <div class="mb-3 custom-toggle-container">
        <input type="radio" name="status" id="status_pending" value="pending" 
            {{ request()->get('status') == 'pending' || !request()->get('status') ? 'checked' : '' }}
            onchange="window.location.href='{{ route('admin.news.index', ['status' => 'pending']) }}'">
        <label for="status_pending" class="custom-toggle {{ request()->get('status') == 'pending' || !request()->get('status') ? 'active' : '' }}">Review</label>

        <input type="radio" name="status" id="status_approved" value="reviewed" 
            {{ request()->get('status') == 'reviewed' ? 'checked' : '' }}
            onchange="window.location.href='{{ route('admin.news.index', ['status' => 'reviewed']) }}'">
        <label for="status_approved" class="custom-toggle {{ request()->get('status') == 'reviewed' ? 'active' : '' }}">Reviewed</label>

        <!-- Sliding background -->
        <div class="toggle-slider"></div>
    </div>



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
                            <a href="{{ route('admin.news.review', ['news' => $item->id, 'mode' => 'edit']) }}" class="btn btn-warning btn-sm text-white">Edit</a>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Display message if no events -->
    @if ($news->isEmpty())
        @if (request()->get('status') == 'pending' || !request()->get('status'))
            <p class="text-center text-muted mt-3">No events waiting for review.</p>
        @elseif (request()->get('status') == 'reviewed')
            <p class="text-center text-muted mt-3">No reviewed events found reviewed.</p>
        @endif
    @endif
</div>
@endsection