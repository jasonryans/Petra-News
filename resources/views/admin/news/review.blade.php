@extends('admin.news.layout')

@section('title', 'Review News Article')

@section('content')
<div class="container mt-4">
    <div class="row my-3">
                <div class="col-md-9">
                    <div class="row">
                        <div class="col-md-4">
                            <img src="{{ asset('storage/' . $news->image) }}" alt="{{ $news->title }}" class="img-fluid">
                        </div>
                        <div class="col-md-8">
                            <h3>{{ $news->title }}</h3>
                        @foreach (explode("\n", $news->description) as $paragraph)
                            <p>{{ $paragraph }}</p>
                        @endforeach   
                        <iframe width="560" height="315" 
                                src="https://www.youtube.com/embed/{{ $news->youtube_link }}" 
                                title="YouTube video player" frameborder="0" 
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                                allowfullscreen>
                        </iframe>         
                        </div>
                    </div>
                </div>
            </div>
                     
            <div class="d-flex justify-content-center mt-4">
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