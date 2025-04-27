@extends('base.base')

@section('title', 'Create News')

@section('content')
    <div class="container">
        <form action="{{ route('news.store') }}" method="POST" enctype="multipart/form-data" class="p-4 shadow rounded bg-light">
            @csrf

            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" name="title" id="title" class="form-control" placeholder="Enter Title" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Information</label>
                <textarea name="description" id="description" class="form-control" placeholder="Enter Information" rows="4" required></textarea>
            </div>

            <div class="mb-3">
                <label for="event_date" class="form-label">Event Date</label>
                <input type="date" name="event_date" id="event_date" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Upload Image</label>
                <input type="file" name="image" id="image" class="form-control">
            </div>

            <div class="mb-3">
                <label for="youtube_link" class="form-label">YouTube Link</label>
                <input type="text" name="youtube_link" id="youtube_link" class="form-control" placeholder="Enter YouTube Link">
            </div>

            <div class="mb-3">
                <label for="category" class="form-label">Category</label>
                <input type="text" name="category" id="category" class="form-control" placeholder="Enter Category" required>
            </div>

            <div class="mb-3">
                <label for="audience" class="form-label">For Who</label>
                <input type="text" name="audience" id="audience" class="form-control" placeholder="Enter Audience" required>
            </div>

            <div class="d-grid">
                <a href="{{ route('news.index')}}"></a>
                <button type="submit" class=" btn btn-success">Submit News</button>
            </div>
        </form>
    </div>
@endsection