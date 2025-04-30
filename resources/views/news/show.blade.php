@extends('base.base')
@section('title', 'Detail News')
@section('content')
<div class="mt-4 bg-white p-4 rounded shadow">
    <h2 class="text-xl font-bold">{{ $news->title }}</h2>
    <p><strong>Event date:</strong> {{ $news->start_date }}</p>
    <a href="{{ route('news.complete', $news->id) }}">
        <button type="button" class="btn btn-link">{{ Str::limit($news->description, 100, '...') }}</button>
    </a>

</div>

@endsection