@extends('base.base')
@section('title', 'Confirmation')
@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h3>{{ $news->title }}</h3>
            <p><strong>Summary:</strong> {{ $news->summary }}</p>
            <p><strong>Description:</strong> {!! nl2br(e($news->description)) !!}</p>
            <p><strong>Category:</strong> {{ $news->category }}</p>
            <p><strong>Start Date:</strong> {{ $news->start_date }}</p>
            <p><strong>End Date:</strong> {{ $news->end_date }}</p>
            @if($news->image)
                <p><strong>Image:</strong></p>
                <img src="{{ asset('storage/' . $news->image) }}" alt="News Image" class="img-fluid">
            @endif
            @if($news->youtube_link)
                <p><strong>YouTube Link:</strong> <a href="https://www.youtube.com/watch?v={{ $news->youtube_link }}" target="_blank">Watch Video</a></p>
            @endif
        </div>
    </div>
    <div class="mt-3">
        <a href="{{ route('news.create') }}" class="btn btn-warning">Edit</a>
        <form action="{{ route('news.submitForApproval', $news->id) }}" method="POST" class="d-inline">
            @csrf
            <button type="submit" class="btn btn-success">Submit for Approval</button>
        </form>
    </div>
</div>
@endsection