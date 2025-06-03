@extends('base.base')

@section('title', 'Edit News Submission')

@section('content')
<div class="container mt-4">
    <form action="{{ route('news.update', $news->id) }}" method="POST" enctype="multipart/form-data" class="p-4 shadow rounded bg-light">
        @csrf
        @method('POST')

        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $news->title) }}" required>
            @error('title')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="summary" class="form-label">Summary</label>
            <input type="text" name="summary" id="summary" class="form-control" value="{{ old('summary', $news->summary) }}" required>
            @error('title')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Information</label>
            <textarea name="description" id="description" class="form-control" rows="4" required>{{ old('description', $news->description) }}</textarea>
            @error('description')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="start_date" class="form-label">Start Date</label>
            <input type="date" name="start_date" id="start_date" class="form-control" value="{{ old('start_date', $news->start_date) }}" required>
            @error('start_date')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="end_date" class="form-label">End Date</label>
            <input type="date" name="end_date" id="end_date" class="form-control" value="{{ old('end_date', $news->end_date) }}" required>
            @error('end_date')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Upload Image</label>
            <input type="file" name="image" id="image" class="form-control">
            @if ($news->image)
                <div class="mt-2">
                    <img src="{{ asset('storage/' . $news->image) }}" alt="Current Image" class="img-thumbnail" style="max-width: 200px;">
                </div>
            @endif
            @error('image')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="youtube_link" class="form-label">YouTube Link</label>
            <input type="text" name="youtube_link" id="youtube_link" class="form-control" value="{{ old('youtube_link', $news->youtube_link) }}">
            @error('youtube_link')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="category" class="form-label">Category</label>
            <select name="category" id="category" class="form-control" required>
                <option value="" disabled>Select Category</option>
                <option class="level-1" value="314" {{ old('category', $news->category) == '314' ? 'selected' : '' }}>&nbsp;&nbsp;&nbsp;&nbsp;Koperasi Mahasiswa&nbsp;&nbsp;</option>
                <option class="level-1" value="232" {{ old('category', $news->category) == '232' ? 'selected' : '' }}>&nbsp;&nbsp;&nbsp;&nbsp;Pelayanan Mahasiswa&nbsp;&nbsp;</option>
                <option class="level-2" value="231" {{ old('category', $news->category) == '231' ? 'selected' : '' }}>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pelayanan Gereja&nbsp;&nbsp;</option>
                <option class="level-1" value="612" {{ old('category', $news->category) == '612' ? 'selected' : '' }}>&nbsp;&nbsp;&nbsp;&nbsp;Tim Petra Sinergy&nbsp;&nbsp;</option>
                <option class="level-0" value="22" {{ old('category', $news->category) == '22' ? 'selected' : '' }}>Majalah Genta&nbsp;&nbsp;</option>
                <option class="level-0" value="1594" {{ old('category', $news->category) == '1594' ? 'selected' : '' }}>Media Partnership&nbsp;&nbsp;</option>
                <option class="level-0" value="158" {{ old('category', $news->category) == '158' ? 'selected' : '' }}>Open House&nbsp;&nbsp;</option>
                <option class="level-0" value="689" {{ old('category', $news->category) == '689' ? 'selected' : '' }}>Pemilu Raya&nbsp;&nbsp;</option>
                <option class="level-0" value="1590" {{ old('category', $news->category) == '1590' ? 'selected' : '' }}>Persekutuan(PERSKI)&nbsp;&nbsp;</option>
                <option class="level-1" value="1591" {{ old('category', $news->category) == '1591' ? 'selected' : '' }}>&nbsp;&nbsp;&nbsp;&nbsp;GMTK&nbsp;&nbsp;</option>
                <option class="level-1" value="1613" {{ old('category', $news->category) == '1613' ? 'selected' : '' }}>&nbsp;&nbsp;&nbsp;&nbsp;HPMT Genta&nbsp;&nbsp;</option>
                <option class="level-0" value="1616" {{ old('category', $news->category) == '1616' ? 'selected' : '' }}>Petra Career Center&nbsp;&nbsp;</option>
                <option class="level-0" value="741" {{ old('category', $news->category) == '741' ? 'selected' : '' }}>Upcoming Events&nbsp;&nbsp;</option>
                <option class="level-0" value="1576" {{ old('category', $news->category) == '1576' ? 'selected' : '' }}>Wisuda&nbsp;&nbsp;</option>
                <option class="level-0" value="1569" {{ old('category', $news->category) == '1569' ? 'selected' : '' }}>Fakultas Bisnis dan Ekonomi&nbsp;&nbsp;</option>
                <option class="level-1" value="1571" {{ old('category', $news->category) == '1571' ? 'selected' : '' }}>&nbsp;&nbsp;&nbsp;&nbsp;Prodi Akuntansi&nbsp;&nbsp;</option>
                <option class="level-2" value="1596" {{ old('category', $news->category) == '1596' ? 'selected' : '' }}>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Program Akuntansi Bisnis&nbsp;&nbsp;</option>
                <option class="level-2" value="1572" {{ old('category', $news->category) == '1572' ? 'selected' : '' }}>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Program International Business Accounting (IBAC)&nbsp;&nbsp;</option>
                <option class="level-1" value="1570" {{ old('category', $news->category) == '1570' ? 'selected' : '' }}>&nbsp;&nbsp;&nbsp;&nbsp;Prodi Akuntansi Pajak&nbsp;&nbsp;</option>
                <option class="level-1" value="1586" {{ old('category', $news->category) == '1586' ? 'selected' : '' }}>&nbsp;&nbsp;&nbsp;&nbsp;Program International Business Management (IBM)&nbsp;&nbsp;</option>
                <option class="level-1" value="1580" {{ old('category', $news->category) == '1580' ? 'selected' : '' }}>&nbsp;&nbsp;&nbsp;&nbsp;Program Manajemen Keuangan&nbsp;&nbsp;</option>
                <option class="level-1" value="1576" {{ old('category', $news->category) == '1576' ? 'selected' : '' }}>&nbsp;&nbsp;&nbsp;&nbsp;Program Manajemen Perhotelan&nbsp;&nbsp;</option>
                <option class="level-0" value="1603" {{ old('category', $news->category) == '1603' ? 'selected' : '' }}>Fakultas Humaniora dan Industri Kreatif&nbsp;&nbsp;</option>
                <option class="level-1" value="1609" {{ old('category', $news->category) == '1609' ? 'selected' : '' }}>&nbsp;&nbsp;&nbsp;&nbsp;Program Studi Sastra Inggris&nbsp;&nbsp;</option>
                <option class="level-2" value="1610" {{ old('category', $news->category) == '1610' ? 'selected' : '' }}>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Petra English Theatre&nbsp;&nbsp;</option>
                <option class="level-0" value="1573" {{ old('category', $news->category) == '1573' ? 'selected' : '' }}>Fakultas Ilmu Komunikasi&nbsp;&nbsp;</option>
                <option class="level-0" value="1602" {{ old('category', $news->category) == '1602' ? 'selected' : '' }}>Fakultas Keguruan dan Ilmu Pendidikan&nbsp;&nbsp;</option>
                <option class="level-0" value="560" {{ old('category', $news->category) == '560' ? 'selected' : '' }}>Fakultas Sastra&nbsp;&nbsp;</option>
                <option class="level-1" value="1587" {{ old('category', $news->category) == '1587' ? 'selected' : '' }}>&nbsp;&nbsp;&nbsp;&nbsp;Prodi Bahasa Mandarin&nbsp;&nbsp;</option>
                <option class="level-0" value="190" {{ old('category', $news->category) == '190' ? 'selected' : '' }}>Fakultas Seni dan Desain&nbsp;&nbsp;</option>
                <option class="level-1" value="1605" {{ old('category', $news->category) == '1605' ? 'selected' : '' }}>&nbsp;&nbsp;&nbsp;&nbsp;Desain Fashion dan Tekstil&nbsp;&nbsp;</option>
                <option class="level-1" value="205" {{ old('category', $news->category) == '205' ? 'selected' : '' }}>&nbsp;&nbsp;&nbsp;&nbsp;Desain Interior&nbsp;&nbsp;</option>
                <option class="level-1" value="191" {{ old('category', $news->category) == '191' ? 'selected' : '' }}>&nbsp;&nbsp;&nbsp;&nbsp;Desain Komunikasi Visual&nbsp;&nbsp;</option>
                <option class="level-2" value="192" {{ old('category', $news->category) == '192' ? 'selected' : '' }}>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Adiwarna&nbsp;&nbsp;</option>
                <option class="level-0" value="1566" {{ old('category', $news->category) == '1566' ? 'selected' : '' }}>Fakultas Teknik Industri&nbsp;&nbsp;</option>
                <option class="level-1" value="1567" {{ old('category', $news->category) == '1567' ? 'selected' : '' }}>&nbsp;&nbsp;&nbsp;&nbsp;Informatika&nbsp;&nbsp;</option>
                <option class="level-2" value="1568" {{ old('category', $news->category) == '1568' ? 'selected' : '' }}>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Sistem Informasi Bisnis (SIB)&nbsp;&nbsp;</option>
                <option class="level-0" value="1574" {{ old('category', $news->category) == '1574' ? 'selected' : '' }}>Fakultas Teknik Sipil dan Perencanaan&nbsp;&nbsp;</option>
                <option class="level-1" value="1575" {{ old('category', $news->category) == '1575' ? 'selected' : '' }}>&nbsp;&nbsp;&nbsp;&nbsp;Program Studi Teknik Sipil&nbsp;&nbsp;</option>
                <option class="level-0" value="358" {{ old('category', $news->category) == '358' ? 'selected' : '' }}>Fakultas Teknologi Industri&nbsp;&nbsp;</option>
                <option class="level-1" value="1584" {{ old('category', $news->category) == '1584' ? 'selected' : '' }}>&nbsp;&nbsp;&nbsp;&nbsp;Program Studi Teknik Industri&nbsp;&nbsp;</option>
                <option class="level-2" value="1585" {{ old('category', $news->category) == '1585' ? 'selected' : '' }}>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Program International Business Engineering (IBE)&nbsp;&nbsp;</option>
                <option class="level-1" value="359" {{ old('category', $news->category) == '359' ? 'selected' : '' }}>&nbsp;&nbsp;&nbsp;&nbsp;Program Studi Teknik Mesin&nbsp;&nbsp;</option>
                <option class="level-0" value="771" {{ old('category', $news->category) == '771' ? 'selected' : '' }}>King Sejong Institute&nbsp;&nbsp;</option>
                <option class="level-0" value="11" {{ old('category', $news->category) == '11' ? 'selected' : '' }}>Lembaga Kemahasiswaan&nbsp;&nbsp;</option>
                <option class="level-1" value="234" {{ old('category', $news->category) == '234' ? 'selected' : '' }}>&nbsp;&nbsp;&nbsp;&nbsp;Himpunan Mahasiswa&nbsp;&nbsp;</option>
                <option class="level-2" value="399" {{ old('category', $news->category) == '399' ? 'selected' : '' }}>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Himahottra&nbsp;&nbsp;</option>
                <option class="level-2" value="1607" {{ old('category', $news->category) == '1607' ? 'selected' : '' }}>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Himaintra&nbsp;&nbsp;</option>
                <option class="level-2" value="283" {{ old('category', $news->category) == '283' ? 'selected' : '' }}>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Himainfra&nbsp;&nbsp;</option>
                <option class="level-2" value="561" {{ old('category', $news->category) == '561' ? 'selected' : '' }}>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Himajaktra&nbsp;&nbsp;</option>
                <option class="level-2" value="1601" {{ old('category', $news->category) == '1601' ? 'selected' : '' }}>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Himasaintra&nbsp;&nbsp;</option>
                <option class="level-2" value="235" {{ old('category', $news->category) == '235' ? 'selected' : '' }}>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Himamatra&nbsp;&nbsp;</option>
                <option class="level-2" value="1598" {{ old('category', $news->category) == '1598' ? 'selected' : '' }}>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Himatantra&nbsp;&nbsp;</option>
                <option class="level-2" value="1582" {{ old('category', $news->category) == '1582' ? 'selected' : '' }}>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Himatektra&nbsp;&nbsp;</option>
                <option class="level-2" value="298" {{ old('category', $news->category) == '298' ? 'selected' : '' }}>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Himatitra&nbsp;&nbsp;</option>
                <option class="level-2" value="329" {{ old('category', $news->category) == '329' ? 'selected' : '' }}>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Himavistra&nbsp;&nbsp;</option>
                <option class="level-2" value="1593" {{ old('category', $news->category) == '1593' ? 'selected' : '' }}>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Himasitra&nbsp;&nbsp;</option>
                <option class="level-2" value="336" {{ old('category', $news->category) == '336' ? 'selected' : '' }}>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Himaartra&nbsp;&nbsp;</option>
                <option class="level-2" value="287" {{ old('category', $news->category) == '287' ? 'selected' : '' }}>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Himasintra&nbsp;&nbsp;</option>
                <option class="level-2" value="904" {{ old('category', $news->category) == '904' ? 'selected' : '' }}>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Himakomtra&nbsp;&nbsp;</option>
                <option class="level-0" value="76" {{ old('category', $news->category) == '76' ? 'selected' : '' }}>Achievement&nbsp;&nbsp;</option>
                <option class="level-0" value="201" {{ old('category', $news->category) == '201' ? 'selected' : '' }}>Badan Eksekutif Mahasiswa&nbsp;&nbsp;</option>
                <option class="level-1" value="202" {{ old('category', $news->category) == '202' ? 'selected' : '' }}>&nbsp;&nbsp;&nbsp;&nbsp;LKMM-TM&nbsp;&nbsp;</option>
                <option class="level-1" value="1615" {{ old('category', $news->category) == '1615' ? 'selected' : '' }}>&nbsp;&nbsp;&nbsp;&nbsp;Servant Leadership Training&nbsp;&nbsp;</option>
                <option class="level-1" value="263" {{ old('category', $news->category) == '263' ? 'selected' : '' }}>&nbsp;&nbsp;&nbsp;&nbsp;UKM&nbsp;&nbsp;</option>
                <option class="level-2" value="303" {{ old('category', $news->category) == '303' ? 'selected' : '' }}>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;BSO&nbsp;&nbsp;</option>
                <option class="level-2" value="1619" {{ old('category', $news->category) == '1619' ? 'selected' : '' }}>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;EFM&nbsp;&nbsp;</option>
                <option class="level-2" value="273" {{ old('category', $news->category) == '273' ? 'selected' : '' }}>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;KSR&nbsp;&nbsp;</option>
                <option class="level-2" value="1617" {{ old('category', $news->category) == '1617' ? 'selected' : '' }}>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Matranak&nbsp;&nbsp;</option>
                <option class="level-2" value="1618" {{ old('category', $news->category) == '1618' ? 'selected' : '' }}>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Mena&nbsp;&nbsp;</option>
                <option class="level-2" value="1595" {{ old('category', $news->category) == '1595' ? 'selected' : '' }}>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;UKM Paduan Suara&nbsp;&nbsp;</option>
                <option class="level-2" value="1612" {{ old('category', $news->category) == '1612' ? 'selected' : '' }}>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;UKM Selam&nbsp;&nbsp;</option>
                <option class="level-2" value="264" {{ old('category', $news->category) == '264' ? 'selected' : '' }}>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;UKM Teater Rumpun Padi&nbsp;&nbsp;</option>
                <option class="level-0" value="265" {{ old('category', $news->category) == '265' ? 'selected' : '' }}>Bank Panitia&nbsp;&nbsp;</option>
                <option class="level-0" value="76" {{ old('category', $news->category) == '76' ? 'selected' : '' }}>BIG Events&nbsp;&nbsp;</option>
                <option class="level-1" value="147" {{ old('category', $news->category) == '147' ? 'selected' : '' }}>&nbsp;&nbsp;&nbsp;&nbsp;Community Outreach Program (COP)&nbsp;&nbsp;</option>
                <option class="level-1" value="1577" {{ old('category', $news->category) == '1577' ? 'selected' : '' }}>&nbsp;&nbsp;&nbsp;&nbsp;Dies Natalis&nbsp;&nbsp;</option>
                <option class="level-1" value="388" {{ old('category', $news->category) == '388' ? 'selected' : '' }}>&nbsp;&nbsp;&nbsp;&nbsp;LKMM-TD&nbsp;&nbsp;</option>
                <option class="level-1" value="129" {{ old('category', $news->category) == '129' ? 'selected' : '' }}>&nbsp;&nbsp;&nbsp;&nbsp;Welcome Grateful Generation&nbsp;&nbsp;</option>
                <option class="level-2" value="159" {{ old('category', $news->category) == '159' ? 'selected' : '' }}>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Open House&nbsp;&nbsp;</option>
                <option class="level-0" value="75" {{ old('category', $news->category) == '75' ? 'selected' : '' }}>Events&nbsp;&nbsp;</option>
                <option class="level-1" value="611" {{ old('category', $news->category) == '611' ? 'selected' : '' }}>&nbsp;&nbsp;&nbsp;&nbsp;Eksternal&nbsp;&nbsp;</option>
                <option class="level-1" value="1604" {{ old('category', $news->category) == '1604' ? 'selected' : '' }}>&nbsp;&nbsp;&nbsp;&nbsp;Office of Institutional Advance&nbsp;&nbsp;</option>
                <option class="level-1" value="309" {{ old('category', $news->category) == '309' ? 'selected' : '' }}>&nbsp;&nbsp;&nbsp;&nbsp;Pelantikan LK-KBM&nbsp;&nbsp;</option>
                <option class="level-1" value="549" {{ old('category', $news->category) == '549' ? 'selected' : '' }}>&nbsp;&nbsp;&nbsp;&nbsp;Pengabdian Masyarakat&nbsp;&nbsp;</option>
                <option class="level-1" value="128" {{ old('category', $news->category) == '128' ? 'selected' : '' }}>&nbsp;&nbsp;&nbsp;&nbsp;Pusat Karir&nbsp;&nbsp;</option>
                <option class="level-2" value="218" {{ old('category', $news->category) == '218' ? 'selected' : '' }}>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pre-Graduation Day Events&nbsp;&nbsp;</option>
                <option class="level-1" value="221" {{ old('category', $news->category) == '221' ? 'selected' : '' }}>&nbsp;&nbsp;&nbsp;&nbsp;Upacara Bendera&nbsp;&nbsp;</option>
            </select>
            @error('category')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="audience" class="form-label">For Who</label>
            <select name="audience" id="audience" class="form-control" required>
                <option value="" disabled>Select Audience</option>
                <option value="Public" {{ old('audience', $news->audience) == 'Public' ? 'selected' : '' }}>Public</option>
                <option value="Students" {{ old('audience', $news->audience) == 'Mahasiswa UKP' ? 'selected' : '' }}>Mahasiswa UKP</option>
                <option value="Teachers" {{ old('audience', $news->audience) == 'Dosen' ? 'selected' : '' }}>Dosen</option>
                <option value="Staff" {{ old('audience', $news->audience) == 'Staf UKP' ? 'selected' : '' }}>Staf UKP</option>
            </select>
            @error('audience')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="d-grid">
            <button type="submit" class="btn btn-success">Update Submission</button>
        </div>
    </form>
</div>
@endsection