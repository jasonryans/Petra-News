@extends('base.base')
@section('title', 'Confirmation')
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
@endphp

<style>
.category-badge {
    display: inline-block; 
    margin-bottom: 0.5rem;
    color: #FFFFFF; 
    padding: 0.8rem 0.8rem; 
    border-radius: 9px;
    font-size: 16px; 
    max-width: fit-content;
    width: auto;
    align-self: flex-start
}
.landing-page-layout {
    max-width: 1200px;
    margin: 0 auto;
}

.poster-section {
    padding: 10px;
    text-align: center;
}

.poster-container {
    display: inline-block;
    min-width: 930px; 
    min-height: 640px;
    background-color: #1a2526;
    overflow: hidden;
    position: relative;
}

.poster-img {
    width: 100%;
    height: 100%;
    object-fit: contain;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
}

.content-section {
    padding: 10px;
}

.content-container {
    padding: 15px;
    width: 300px;
    height: 640px;
    background-color: #f9f9f9;
}

.event-title {
    font-size: 1.8em;
    margin-bottom: 15px;
    color: #333;
}

.start-date {
    color: #d49726;
    font-size: 18px;
    font-weight: bold;
}

.event-details-title {
    font-size: 25px; 
    margin-bottom: 15px;
    color: #333;
}

.description-content {
    font-size: 20px; /* Increased font size for $news->description content */
    margin-bottom: 20px;
    color: #333;
}

iframe {
    max-width: 100%; /* Ensures the iframe fits within the column */
    height: 500px; /* Adjusted height for a better desktop view */
    border: none; /* Optional: removes default iframe border */
}
</style>

<div class="container">
    <div class="card">
        <div class="card-body">
            <div class="container my-3">
                <div class="row">
                    <div class="col-md-9 poster-section">
                        <div class="poster-container">
                            <img src="{{ asset('storage/' . $news->image) }}" alt="{{ $news->title }}" class="poster-img">
                        </div>
                    </div>

                    <div class="col-md-3 content-section">
                        <div class="content-container">
                            <span class="badge category-badge" style="background-color: {{ getCategoryColor($news->category_display, $categoryColors) }};">
                                {{ $news->category_display }}
                            </span>
                            <h2 class="event-title"><strong>{{ $news->title }}</strong></h2>
                            <p class="start-date mb-2 fw-bold">
                                <i class="far fa-calendar-alt me-1"></i>
                                {{ \Carbon\Carbon::parse($news->start_date)->format('d M Y') }} - {{ \Carbon\Carbon::parse($news->end_date)->format('d M Y') }}
                            </p>
                            <div style="white-space: pre-wrap;">{{ strip_tags($news->summary) }}</div>
                        </div>
                    </div>

                    <div class="col-md-8">
                        <h4 class="mb-3 event-details-title">Event Details</h4>
                        <div class="description-content" style="white-space: pre-wrap;">{{ strip_tags($news->description) }}</div>
                        <iframe width="100%" height="500" 
                            src="https://www.youtube.com/embed/{{ $news->youtube_link }}" 
                            title="YouTube video player" frameborder="0" 
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                            allowfullscreen>
                        </iframe>                 
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="mt-3">
        <a href="{{ route('news.edit', $news->id) }}" class="btn btn-warning">Edit</a>
        <form action="{{ route('news.submitForApproval', $news->id) }}" method="POST" class="d-inline">
            @csrf
            <button type="submit" class="btn btn-success">Submit for Approval</button>
        </form>
    </div>
</div>
@endsection