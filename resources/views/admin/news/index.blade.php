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
                <th>Action</th>
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
    @if ($item->status == 'pending')
        <!-- APPROVE -->
        <form action="{{ route('admin.news.approve', $item) }}" method="POST" class="d-inline">
            @csrf
            <button type="submit" class="btn btn-success btn-sm">Approve</button>
        </form>

        <!-- BUTTON REJECT -->
        <!-- <div id="reject-form-{{ $item->id }}" class="d-inline">
            <button type="button" class="btn btn-danger btn-sm ms-2"
                    onclick="showRejectInput({{ $item->id }})">
                Reject
            </button>
        </div> -->

        <!-- INPUTAN MEMO + SELESAI -->
        <form action="{{ route('admin.news.reject', $item) }}" method="POST" class="d-inline ms-2" id="reject-input-{{ $item->id }}" style="display: none;">
            @csrf
            <input type="text" name="memo" class="form-control form-control-sm d-inline w-auto me-2" placeholder="Alasan penolakan" required>
            <button type="submit" class="btn btn-danger btn-sm">Reject</button>
        </form>

    @elseif ($item->status == 'approved')
        <form action="{{ route('admin.news.takedown', $item) }}" method="POST" class="d-inline">
            @csrf
            <button type="submit" class="btn btn-warning btn-sm">Takedown</button>
        </form>

    @elseif ($item->status == 'rejected')
        <div>
            <strong>Alasan:</strong>
            <p>{{ $item->rejection_memo ?? '-' }}</p>
        </div>
    @endif
</td>




                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- <script>
    function showRejectInput(id) {
        document.getElementById('reject-form-' + id).style.display = 'none';
        document.getElementById('reject-input-' + id).style.display = 'inline';
    }
</script> -->


@endsection