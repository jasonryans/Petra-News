@extends('base.base')

@section('title', 'All News')

@section('content')
<div class="container mt-4">
    <div class="row">
        @forelse ($news as $item)
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="card news-card h-100">
                    <div class="card-img-top bg-dark text-center py-4">
                        <i class="fas fa-newspaper text-warning" style="font-size: 3rem;"></i>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title fw-bold">{{ $item->title }}</h5>
                        <p class="news-date mb-2">
                            <i class="far fa-calendar-alt me-1"></i> {{ $item->start_date }}
                        </p>
                        <p class="card-text">{{ Str::limit($item->description, 100, '...') }}</p>
                        <a href="{{ route('news.show', $item->id) }}" class="btn btn-sm btn-dark btn-detail">
                            <i class="fas fa-arrow-right me-1"></i> Read More
                        </a>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <p class="text-center">No news found for your search.</p>
            </div>
        @endforelse
    </div>
</div>
@endsection