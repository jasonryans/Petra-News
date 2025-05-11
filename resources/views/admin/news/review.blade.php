@extends('admin.news.layout')

@section('title', 'Review News Article')

@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h4>Review News Article</h4>
        </div>
        <div class="card-body">
            <h2 class="text-xl font-bold">{{ $news->title }}</h2>
            <div class="mb-3">
                <strong>Event date:</strong> {{ $news->start_date }} to {{ $news->end_date }}
            </div>
            <div class="mb-3">
                <strong>Created at:</strong> {{ $news->created_at->format('d-m-Y H:i') }}
            </div>
            <div class="mb-4">
                <strong>Description:</strong>
                <div class="mt-2 p-3 border rounded">
                    {{ $news->description }}
                </div>
            </div>
            
            <div class="d-flex mt-4">
                <!-- Approve Button -->
                <form action="{{ route('admin.news.approve', $news) }}" method="POST" class="me-2">
                    @csrf
                    <button type="submit" class="btn btn-success">Approve</button>
                </form>
                
                <!-- Reject Button -->
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#rejectModal">
                    Reject
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Reject Modal -->
<div class="modal fade" id="rejectModal" tabindex="-1" aria-labelledby="rejectModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title" id="rejectModalLabel">Reason for Rejection</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('admin.news.reject', $news) }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="memo" class="form-label">Please provide a reason for rejection:</label>
                        <textarea class="form-control" id="memo" name="memo" rows="3" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger">Reject</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection