@extends('base.base')

@section('title', 'All News')

@section('content')
@php
    use Carbon\Carbon;  

    $categoryColors = [
        'Koperasi Mahasiswa' => '#007bff',
        'Pelayanan Mahasiswa' => '#28a745',
        'Pelayanan Gereja' => '#dc3545',
        'Tim Petra Sinergy' => '#ffc107',
        'Majalah Genta' => '#17a2b8',
        'Media Partnership' => '#6c757d',
        'Open House' => '#fd7e14',
        'Pemilu Raya' => '#20c997',
        'Persekutuan (PERSKI)' => '#6610f2',
        'GMTK' => '#e83e8c',
        'HPMT Genta' => '#343a40',
        'Petra Career Center' => '#6f42c1',
        'Upcoming Events' => '#d63384',
        'Wisuda' => '#198754',
        'Fakultas Bisnis dan Ekonomi' => '#ffca2c',
        'Prodi Akuntansi' => '#0dcaf0',
        'Program Akuntansi Bisnis' => '#adb5bd',
        'Program International Business Accounting (IBAC)' => '#ff851b',
        'Prodi Akuntansi Pajak' => '#1abc9c',
        'Program Akuntansi Pajak Program International Business Engineering' => '#4b0082',
        'Program International Business Management (IBM)' => '#ff80bf',
        'Program Manajemen Keuangan' => '#212529',
        'Program Manajemen Perhotelan' => '#5a6268',
        'Fakultas Humaniora dan Industri Kreatif' => '#2ecc71',
        'Program Studi Sastra Inggris' => '#e74c3c',
        'Petra English Theatre' => '#f1c40f',
        'Fakultas Ilmu Komunikasi' => '#3498db',
        'Fakultas Keguruan dan Ilmu Pendidikan' => '#95a5a6',
        'Fakultas Sastra' => '#e67e22',
        'Prodi Bahasa Mandarin' => '#16a085',
        'Fakultas Seni dan Desain' => '#8e44ad',
        'Desain Fashion dan Tekstil' => '#d81b60',
        'Desain Interior' => '#2c3e50',
        'Desain Komunikasi Visual' => '#00bcd4',
        'Adiwarna' => '#27ae60',
        'Fakultas Teknik Industri' => '#c0392b',
        'Informatika' => '#f39c12',
        'Sistem Informasi Bisnis (SIB)' => '#2980b9',
        'Fakultas Teknik Sipil dan Perencanaan' => '#7f8c8d',
        'Program Studi Teknik Sipil' => '#d35400',
        'Fakultas Teknologi Industri' => '#1e90ff',
        'Program Studi Teknik Industri' => '#9b59b6',
        'Program International Business Engineering (IBE)' => '#ec407a',
        'Program Studi Teknik Mesin' => '#34495e',
        'King Sejong Institute' => '#00acc1',
        'Lembaga Kemahasiswaan' => '#2ecc40',
        'Himpunan Mahasiswa' => '#f44336',
        'Himahottra' => '#ffeb3b',
        'Himaintra' => '#03a9f4',
        'Himainfra' => '#607d8b',
        'Himajaktra' => '#ef6c00',
        'Himaketra' => '#2196f3',
        'Himamesra' => '#ab47bc',
        'Himatitra' => '#f06292',
        'Himabamatra' => '#455a64',
        'Himasaintra' => '#4caf50',
        'Himamatra' => '#e91e63',
        'Himatantra' => '#ffb300',
        'Himatektra' => '#0288d1',
        'Himavistra' => '#78909c',
        'Himasitra' => '#f57c00',
        'Himaartra' => '#1976d2',
        'Himasintra' => '#ba68c8',
        'Himakomtra' => '#ef5350',
        'Achievement' => '#546e7a',
        'Badan Eksekutif Mahasiswa' => '#66bb6a',
        'LKM-ID' => '#ff1744',
        'LKM-TR' => '#ffca28',
        'Servant Leadership Training' => '#29b6f6',
        'UKM' => '#90a4ae',
        'BSO' => '#fb8c00',
        'EFM' => '#039be5',
        'KSR' => '#ce93d8',
        'Matranak' => '#ff5252',
        'Mena' => '#37474f',
        'UKM Paduan Suara' => '#81c784',
        'UKM Selam' => '#ff4081',
        'UKM Teater Rumpun Padi' => '#fdd835',
        'Bank Panitia' => '#26c6da',
        'BIG Events' => '#b0bec5',
        'Community Outreach Program (COP)' => '#ffa726',
        'Dies Natalis' => '#0288d1',
        'LKMM-TD' => '#9575cd',
        'Welcome Grateful Generation' => '#ff6e40',
        'Events' => '#4dd0e1',
        'Eksternal' => '#78909c',
        'Office of Institutional Advance' => '#ffab40',
        'Pelantikan LK-TR' => '#4fc3f7',
        'Pengabdian Masyarakat' => '#b39ddb',
        'Pusat Karir' => '#ff8a65',
        'Pre-Graduation Day Events' => '#80deea',
        'Upacara Bendera' => '#a1887f',
        'default' => '#adb5bd'
    ];

    function getCategoryColor($category, $colors) {
        return isset($colors[$category]) ? $colors[$category] : $colors['default'];
    }

    // Sort news based on start_date (default to earliest)
    $sortedNews = $news->sortBy(function($item) {
        return Carbon::parse($item->start_date)->timestamp;
    });

    // Group news by category for "Filter" view and sort within each category
    $groupedNews = $sortedNews->groupBy('category_display')->map(function ($group) {
        return $group->sortBy(function ($item) {
            return Carbon::parse($item->start_date)->timestamp;
        });
    });
@endphp

<style>
    .category-badge {
        display: inline-block; 
        margin-bottom: 0.5rem;
        color: #FFFFFF; 
        padding: 0.8rem 0.8rem; 
        border-radius: 9px;
        font-size: 20px; 
        max-width: fit-content;
        width: auto;
        align-self: flex-start
    }

    .card-body {
        display: flex;
        flex-direction: column;
    }

    .card-content {
        flex-grow: 1;
        display: flex;
        flex-direction: column;
    }

    .btn-detail {
        margin-top: auto;
        align-self: flex-start;
    }

    .category-toggle-btn {
        padding: 8px 16px;
        font-weight: 500;
        cursor: pointer;
        border: 2px solid #c1c4c7;
        border-radius: 10px;
        text-align: center;
        transition: background-color 0.3s ease, color 0.3s ease;
    }

    .category-toggle-btn.off {
        background-color: #e1e3e6;
        color: #969a9e;
    }

    .category-toggle-btn.on {
        background-color: #06498c;
        color: #FFFFFF;
    }

    .image-container {
        background-color: #212529;
        width: 100%;
        height: 250px;
        display: flex;
        justify-content: center;
        align-items: center;
        overflow: hidden;
    }

    .news-image {
        max-height: 100%;
        max-width: 100%;
        width: auto;
        height: auto;
        object-fit: contain;
    }
    .news-date {
        color: #d49726;
        font-size: 18px;
    }
</style>

<div class="container mt-4">
    <div class="d-flex align-items-center mb-4">
        <h5 class="me-3">Filter by</h5>
        <button class="category-toggle-btn off me-3" id="category-toggle">Category</button>
    </div>

    <!-- All View -->
    <div id="all-view" class="view">
        <div class="row">
            @forelse ($sortedNews as $item)
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card news-card h-100">
                        <div class="image-container">
                            @if ($item->image)
                                <img src="{{ asset('storage/' . $item->image) }}" alt="News Image" class="news-image">
                            @else
                                <i class="fas fa-newspaper text-warning" style="font-size: 3rem;"></i>
                            @endif
                        </div>
                        <div class="card-body">
                            <div class="card-content">
                                <span class="badge category-badge" data-category="{{ $item->category_display }}" style="background-color: {{ getCategoryColor($item->category_display, $categoryColors) }};">
                                    {{ $item->category_display }}
                                </span>
                                <h5 class="card-title fw-bold">{{ $item->title }}</h5>
                                <p class="news-date mb-2 fw-bold">
                                    <i class="far fa-calendar-alt me-1"></i>
                                    {{ \Carbon\Carbon::parse($item->start_date)->format('d M Y') }} - {{ \Carbon\Carbon::parse($item->end_date)->format('d M Y') }}
                                </p>
                                <p class="card-text">{{ Str::limit($item->summary, 200, '...') }}</p>
                            </div>
                            <a href="{{ route('news.complete', $item->id) }}" class="btn btn-sm btn-dark btn-detail">
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
    <!-- Filter View -->
    <div id="filter-view" class="view" style="display: none;">
        @forelse ($groupedNews as $category => $items)
            <div class="mb-4">
                <div class="mb-2">
                    <span class="badge category-badge" style="background-color: {{ getCategoryColor($category, $categoryColors) }};">
                        {{ $category }}
                    </span>
                </div>
                <div class="row">
                    @foreach ($items as $item)
                        <div class="col-md-6 col-lg-4 mb-4">
                            <div class="card news-card h-100">
                                <div class="image-container">
                                    @if ($item->image)
                                        <img src="{{ asset('storage/' . $item->image) }}" alt="News Image" class="news-image">
                                    @else
                                        <i class="fas fa-newspaper text-warning" style="font-size: 3rem;"></i>
                                    @endif
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title fw-bold">{{ $item->title }}</h5>
                                    <p class="news-date mb-2 fw-bold">
                                        <i class="far fa-calendar-alt me-1"></i>
                                        {{ \Carbon\Carbon::parse($item->start_date)->format('d M Y') }} - {{ \Carbon\Carbon::parse($item->end_date)->format('d M Y') }}
                                    </p>
                                    <p class="card-text">{{ Str::limit($item->summary, 200, '...') }}</p>
                                    <a href="{{ route('news.complete', $item->id) }}" class="btn btn-sm btn-dark btn-detail">
                                        <i class="fas fa-arrow-right me-1"></i> Read More
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @empty
            <div class="col-12">
                <p class="text-center">No news found for your search.</p>
            </div>
        @endforelse
    </div>
</div>

<script>
    const toggleButton = document.getElementById('category-toggle');
    const allView = document.getElementById('all-view');
    const filterView = document.getElementById('filter-view');

    toggleButton.addEventListener('click', () => {
        if (toggleButton.classList.contains('off')) {
            toggleButton.classList.remove('off');
            toggleButton.classList.add('on');
            toggleButton.textContent = 'Category';
            allView.style.display = 'none';
            filterView.style.display = 'block';
        } else {
            toggleButton.classList.remove('on');
            toggleButton.classList.add('off');
            toggleButton.textContent = 'Category';
            allView.style.display = 'block';
            filterView.style.display = 'none';
        }
    });
</script>
@endsection