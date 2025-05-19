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
                <label for="start_date" class="form-label">Start Date</label>
                <input type="date" name="start_date" id="start_date" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="end_date" class="form-label">End Date</label>
                <input type="date" name="end_date" id="end_date" class="form-control" required>
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
                <select name="category" id="category" class="form-control" required onchange="toggleOtherInput('category')">
                    <option value="" disabled selected>Select Category</option>
                    <option class="level-1" value="314">&nbsp;&nbsp;&nbsp;&nbsp;Koperasi Mahasiswa&nbsp;&nbsp;</option>
                    <option class="level-1" value="232">&nbsp;&nbsp;&nbsp;&nbsp;Pelayanan Mahasiswa&nbsp;&nbsp;</option>
                    <option class="level-2" value="231">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pelayanan Gereja&nbsp;&nbsp;</option>
                    <option class="level-1" value="612">&nbsp;&nbsp;&nbsp;&nbsp;Tim Petra Sinergy&nbsp;&nbsp;</option>
                    <option class="level-0" value="22">Majalah Genta&nbsp;&nbsp;</option>
                    <option class="level-0" value="1594">Media Partnership&nbsp;&nbsp;</option>
                    <option class="level-0" value="158">Open House&nbsp;&nbsp;</option>
                    <option class="level-0" value="689">Pemilu Raya&nbsp;&nbsp;</option>
                    <option class="level-0" value="1590">Persekutuan(PERSKI)&nbsp;&nbsp;</option>
                    <option class="level-1" value="1591">&nbsp;&nbsp;&nbsp;&nbsp;GMTK&nbsp;&nbsp;</option>
                    <option class="level-1" value="1613">&nbsp;&nbsp;&nbsp;&nbsp;HPMT Genta&nbsp;&nbsp;</option>
                    <option class="level-0" value="1616">Petra Career Center&nbsp;&nbsp;</option>
                    <option class="level-0" value="741">Upcoming Events&nbsp;&nbsp;</option>
                    <option class="level-0" value="1576">Wisuda&nbsp;&nbsp;</option>
                    <option class="level-0" value="1569">Fakultas Bisnis dan Ekonomi&nbsp;&nbsp;</option>
                    <option class="level-1" value="1571">&nbsp;&nbsp;&nbsp;&nbsp;Prodi Akuntansi&nbsp;&nbsp;</option>
                    <option class="level-2" value="1596">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Program Akuntansi Bisnis&nbsp;&nbsp;</option>
                    <option class="level-2" value="1572">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Program International Business Accounting (IBAC)&nbsp;&nbsp;</option>
                    <option class="level-1" value="1570">&nbsp;&nbsp;&nbsp;&nbsp;Prodi Akuntansi Pajak&nbsp;&nbsp;</option>
                    <option class="level-2" value="1583">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Program Akuntansi Pajak Program International Business Engineering&nbsp;&nbsp;</option>
                    <option class="level-1" value="1586">&nbsp;&nbsp;&nbsp;&nbsp;Program International Business Management (IBM)&nbsp;&nbsp;</option>
                    <option class="level-1" value="1580">&nbsp;&nbsp;&nbsp;&nbsp;Program Manajemen Keuangan&nbsp;&nbsp;</option>
                    <option class="level-1" value="1576">&nbsp;&nbsp;&nbsp;&nbsp;Program Manajemen Perhotelan&nbsp;&nbsp;</option>
                    <option class="level-0" value="1603">Fakultas Humaniora dan Industri Kreatif&nbsp;&nbsp;</option>
                    <option class="level-1" value="1609">&nbsp;&nbsp;&nbsp;&nbsp;Program Studi Sastra Inggris&nbsp;&nbsp;</option>
                    <option class="level-2" value="1610">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Petra English Theatre&nbsp;&nbsp;</option>
                    <option class="level-0" value="1573">Fakultas Ilmu Komunikasi&nbsp;&nbsp;</option>
                    <option class="level-0" value="1602">Fakultas Keguruan dan Ilmu Pendidikan&nbsp;&nbsp;</option>
                    <option class="level-0" value="560">Fakultas Sastra&nbsp;&nbsp;</option>
                    <option class="level-1" value="1587">&nbsp;&nbsp;&nbsp;&nbsp;Prodi Bahasa Mandarin&nbsp;&nbsp;</option>
                    <option class="level-0" value="190">Fakultas Seni dan Desain&nbsp;&nbsp;</option>
                    <option class="level-1" value="1605">&nbsp;&nbsp;&nbsp;&nbsp;Desain Fashion dan Tekstil&nbsp;&nbsp;</option>
                    <option class="level-1" value="205">&nbsp;&nbsp;&nbsp;&nbsp;Desain Interior&nbsp;&nbsp;</option>
                    <option class="level-1" value="191">&nbsp;&nbsp;&nbsp;&nbsp;Desain Komunikasi Visual&nbsp;&nbsp;</option>
                    <option class="level-2" value="192">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Adiwarna&nbsp;&nbsp;</option>
                    <option class="level-0" value="1566">Fakultas Teknik Industri&nbsp;&nbsp;</option>
                    <option class="level-1" value="1567">&nbsp;&nbsp;&nbsp;&nbsp;Informatika&nbsp;&nbsp;</option>
                    <option class="level-2" value="1568">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Sistem Informasi Bisnis (SIB)&nbsp;&nbsp;</option>
                    <option class="level-0" value="1574">Fakultas Teknik Sipil dan Perencanaan&nbsp;&nbsp;</option>
                    <option class="level-1" value="1575">&nbsp;&nbsp;&nbsp;&nbsp;Program Studi Teknik Sipil&nbsp;&nbsp;</option>
                    <option class="level-0" value="358">Fakultas Teknologi Industri&nbsp;&nbsp;</option>
                    <option class="level-1" value="1584">&nbsp;&nbsp;&nbsp;&nbsp;Program Studi Teknik Industri&nbsp;&nbsp;</option>
                    <option class="level-2" value="1585">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Program International Business Engineering (IBE)&nbsp;&nbsp;</option>
                    <option class="level-1" value="359">&nbsp;&nbsp;&nbsp;&nbsp;Program Studi Teknik Mesin&nbsp;&nbsp;</option>
                    <option class="level-0" value="771">King Sejong Institute&nbsp;&nbsp;</option>
                    <option class="level-0" value="11">Lembaga Kemahasiswaan&nbsp;&nbsp;</option>
                    <option class="level-1" value="234">&nbsp;&nbsp;&nbsp;&nbsp;Himpunan Mahasiswa&nbsp;&nbsp;</option>
                    <option class="level-2" value="399">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Himahottra&nbsp;&nbsp;</option>
                    <option class="level-2" value="1607">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Himaintra&nbsp;&nbsp;</option>
                    <option class="level-2" value="283">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Himainfra&nbsp;&nbsp;</option>
                    <option class="level-2" value="561">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Himajaktra&nbsp;&nbsp;</option>
                    <option class="level-2" value="561">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Himaketra&nbsp;&nbsp;</option>
                    <option class="level-2" value="561">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Himamesra&nbsp;&nbsp;</option>
                    <option class="level-2" value="561">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Himatitra&nbsp;&nbsp;</option>
                    <option class="level-2" value="561">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Himabamatra&nbsp;&nbsp;</option>
                    <option class="level-2" value="1601">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Himasaintra&nbsp;&nbsp;</option>
                    <option class="level-2" value="235">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Himamatra&nbsp;&nbsp;</option>
                    <option class="level-2" value="1598">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Himatantra&nbsp;&nbsp;</option>
                    <option class="level-2" value="1582">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Himatektra&nbsp;&nbsp;</option>
                    <option class="level-2" value="298">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Himatitra&nbsp;&nbsp;</option>
                    <option class="level-2" value="329">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Himavistra&nbsp;&nbsp;</option>
                    <option class="level-2" value="1593">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Himasitra&nbsp;&nbsp;</option>
                    <option class="level-2" value="336">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Himaartra&nbsp;&nbsp;</option>
                    <option class="level-2" value="287">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Himasintra&nbsp;&nbsp;</option>
                    <option class="level-2" value="904">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Himakomtra&nbsp;&nbsp;</option>
                    <option class="level-0" value="76">Achievement&nbsp;&nbsp;</option>
                    <option class="level-0" value="201">Badan Eksekutif Mahasiswa&nbsp;&nbsp;</option>
                    <option class="level-1" value="631">&nbsp;&nbsp;&nbsp;&nbsp;LKM-ID&nbsp;&nbsp;</option>
                    <option class="level-1" value="202">&nbsp;&nbsp;&nbsp;&nbsp;LKM-TR&nbsp;&nbsp;</option>
                    <option class="level-1" value="1615">&nbsp;&nbsp;&nbsp;&nbsp;Servant Leadership Training&nbsp;&nbsp;</option>
                    <option class="level-1" value="263">&nbsp;&nbsp;&nbsp;&nbsp;UKM&nbsp;&nbsp;</option>
                    <option class="level-2" value="303">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;BSO&nbsp;&nbsp;</option>
                    <option class="level-2" value="1619">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;EFM&nbsp;&nbsp;</option>
                    <option class="level-2" value="273">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;KSR&nbsp;&nbsp;</option>
                    <option class="level-2" value="1617">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Matranak&nbsp;&nbsp;</option>
                    <option class="level-2" value="1618">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Mena&nbsp;&nbsp;</option>
                    <option class="level-2" value="1595">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;UKM Paduan Suara&nbsp;&nbsp;</option>
                    <option class="level-2" value="1612">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;UKM Selam&nbsp;&nbsp;</option>
                    <option class="level-2" value="264">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;UKM Teater Rumpun Padi&nbsp;&nbsp;</option>
                    <option class="level-0" value="265">Bank Panitia&nbsp;&nbsp;</option>
                    <option class="level-0" value="76">BIG Events&nbsp;&nbsp;</option>
                    <option class="level-1" value="147">&nbsp;&nbsp;&nbsp;&nbsp;Community Outreach Program (COP)&nbsp;&nbsp;</option>
                    <option class="level-1" value="1577">&nbsp;&nbsp;&nbsp;&nbsp;Dies Natalis&nbsp;&nbsp;</option>
                    <option class="level-1" value="388">&nbsp;&nbsp;&nbsp;&nbsp;LKMM-TD&nbsp;&nbsp;</option>
                    <option class="level-1" value="129">&nbsp;&nbsp;&nbsp;&nbsp;Welcome Grateful Generation&nbsp;&nbsp;</option>
                    <option class="level-2" value="159">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Open House&nbsp;&nbsp;</option>
                    <option class="level-0" value="75">Events&nbsp;&nbsp;</option>
                    <option class="level-1" value="611">&nbsp;&nbsp;&nbsp;&nbsp;Eksternal&nbsp;&nbsp;</option>
                    <option class="level-1" value="1604">&nbsp;&nbsp;&nbsp;&nbsp;Office of Institutional Advance&nbsp;&nbsp;</option>
                    <option class="level-1" value="309">&nbsp;&nbsp;&nbsp;&nbsp;Pelantikan LK-TR&nbsp;&nbsp;</option>
                    <option class="level-1" value="549">&nbsp;&nbsp;&nbsp;&nbsp;Pengabdian Masyarakat&nbsp;&nbsp;</option>
                    <option class="level-1" value="128">&nbsp;&nbsp;&nbsp;&nbsp;Pusat Karir&nbsp;&nbsp;</option>
                    <option class="level-2" value="218">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pre-Graduation Day Events&nbsp;&nbsp;</option>
                    <option class="level-1" value="221">&nbsp;&nbsp;&nbsp;&nbsp;Upacara Bendera&nbsp;&nbsp;</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="audience" class="form-label">For Who</label>
                <select name="audience" id="audience" class="form-control" required onchange="toggleOtherInput('audience')">
                    <option value="" disabled selected>Select Audience</option>
                    <option value="Public">Public</option>
                    <option value="Students">Mahasiswa UKP</option>
                    <option value="Teachers">Dosen</option>
                    <option value="Staff">Staf UKP</option>
                </select>
            </div>
    
            <div class="d-grid">
                <a href="{{ route('news.index')}}"></a>
                <button type="submit" class=" btn btn-success">Submit News</button>
            </div>
        </form>
    </div>
@endsection