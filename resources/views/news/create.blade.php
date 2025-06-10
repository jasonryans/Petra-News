@extends('base.base')

@section('title', 'Create News')

@section('content')
    <div class="container">
        <form action="{{ route('news.store') }}" method="POST" enctype="multipart/form-data" class="p-4 shadow rounded bg-light">
            @csrf
            <input type="hidden" name="draft_id" id="draft_id" value="{{ request('draft') }}">

            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" name="title" id="title" class="form-control" placeholder="Enter Title" required>
            </div>

            <div class="mb-3">
                <label for="summary" class="form-label">Summary</label>
                <textarea name="summary" id="summary" class="form-control" placeholder="Enter Summary" rows="4" required></textarea>
                <div id="summaryWordCount" class="form-text text-muted">Word count: 0/80</div>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Information</label>
                <textarea name="description" id="description" class="form-control" placeholder="Enter Information" rows="4" required></textarea>
                <div id="wordCount" class="form-text text-muted">Word count: 0/600</div>
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
                <input type="file" name="image" id="image" class="form-control" required>
                <div class="form-text text-muted">Maximum file size: 2MB (2048 KB). Accepted formats: JPEG, PNG, JPG, GIF.</div>
            </div>

            <div class="mb-3">
                <label for="youtube_link" class="form-label">YouTube Link</label>
                <input type="text" name="youtube_link" id="youtube_link" class="form-control" placeholder="Enter YouTube Link">
            </div>

            <div class="mb-3">
                <label for="category" class="form-label">Category</label>
                <select name="category" id="category" class="form-control" required>
                    <option value="" disabled selected>Select Category</option>
                    <option class="level-1" value="314">    Koperasi Mahasiswa  </option>
                    <option class="level-1" value="232">    Pelayanan Mahasiswa  </option>
                    <option class="level-2" value="231">      Pelayanan Gereja  </option>
                    <option class="level-1" value="612">    Tim Petra Sinergy  </option>
                    <option class="level-0" value="22">Majalah Genta  </option>
                    <option class="level-0" value="1594">Media Partnership  </option>
                    <option class="level-0" value="158">Open House  </option>
                    <option class="level-0" value="689">Pemilu Raya  </option>
                    <option class="level-0" value="1590">Persekutuan(PERSKI)  </option>
                    <option class="level-1" value="1591">    GMTK  </option>
                    <option class="level-1" value="1613">    HPMT Genta  </option>
                    <option class="level-0" value="1616">Petra Career Center  </option>
                    <option class="level-0" value="741">Upcoming Events  </option>
                    <option class="level-0" value="1576">Wisuda  </option>
                    <option class="level-0" value="1569">Fakultas Bisnis dan Ekonomi  </option>
                    <option class="level-1" value="1571">    Prodi Akuntansi  </option>
                    <option class="level-2" value="1596">      Program Akuntansi Bisnis  </option>
                    <option class="level-2" value="1572">      Program International Business Accounting (IBAC)  </option>
                    <option class="level-1" value="1570">    Prodi Akuntansi Pajak  </option>
                    <option class="level-1" value="1586">    Program International Business Management (IBM)  </option>
                    <option class="level-1" value="1580">    Program Manajemen Keuangan  </option>
                    <option class="level-1" value="1576">    Program Manajemen Perhotelan  </option>
                    <option class="level-0" value="1603">Fakultas Humaniora dan Industri Kreatif  </option>
                    <option class="level-1" value="1609">    Program Studi Sastra Inggris  </option>
                    <option class="level-2" value="1610">      Petra English Theatre  </option>
                    <option class="level-0" value="1573">Fakultas Ilmu Komunikasi  </option>
                    <option class="level-0" value="1602">Fakultas Keguruan dan Ilmu Pendidikan  </option>
                    <option class="level-0" value="560">Fakultas Sastra  </option>
                    <option class="level-1" value="1587">    Prodi Bahasa Mandarin  </option>
                    <option class="level-0" value="190">Fakultas Seni dan Desain  </option>
                    <option class="level-1" value="1605">    Desain Fashion dan Tekstil  </option>
                    <option class="level-1" value="205">    Desain Interior  </option>
                    <option class="level-1" value="191">    Desain Komunikasi Visual  </option>
                    <option class="level-2" value="192">      Adiwarna  </option>
                    <option class="level-0" value="1566">Fakultas Teknik Industri  </option>
                    <option class="level-1" value="1567">    Informatika  </option>
                    <option class="level-2" value="1568">      Sistem Informasi Bisnis (SIB)  </option>
                    <option class="level-0" value="1574">Fakultas Teknik Sipil dan Perencanaan  </option>
                    <option class="level-1" value="1575">    Program Studi Teknik Sipil  </option>
                    <option class="level-0" value="358">Fakultas Teknologi Industri  </option>
                    <option class="level-1" value="1584">    Program Studi Teknik Industri  </option>
                    <option class="level-2" value="1585">      Program International Business Engineering (IBE)  </option>
                    <option class="level-1" value="359">    Program Studi Teknik Mesin  </option>
                    <option class="level-0" value="771">King Sejong Institute  </option>
                    <option class="level-0" value="11">Lembaga Kemahasiswaan  </option>
                    <option class="level-1" value="234">    Himpunan Mahasiswa  </option>
                    <option class="level-2" value="399">      Himahottra  </option>
                    <option class="level-2" value="1607">      Himaintra  </option>
                    <option class="level-2" value="283">      Himainfra  </option>
                    <option class="level-2" value="561">      Himajaktra  </option>
                    <option class="level-2" value="561">      Himaketra  </option>
                    <option class="level-2" value="561">      Himamesra  </option>
                    <option class="level-2" value="561">      Himatitra  </option>
                    <option class="level-2" value="561">      Himabamatra  </option>
                    <option class="level-2" value="1601">      Himasaintra  </option>
                    <option class="level-2" value="235">      Himamatra  </option>
                    <option class="level-2" value="1598">      Himatantra  </option>
                    <option class="level-2" value="1582">      Himatektra  </option>
                    <option class="level-2" value="298">      Himatitra  </option>
                    <option class="level-2" value="329">      Himavistra  </option>
                    <option class="level-2" value="1593">      Himasitra  </option>
                    <option class="level-2" value="336">      Himaartra  </option>
                    <option class="level-2" value="287">      Himasintra  </option>
                    <option class="level-2" value="904">      Himakomtra  </option>
                    <option class="level-0" value="76">Achievement  </option>
                    <option class="level-0" value="201">Badan Eksekutif Mahasiswa  </option>
                    <option class="level-1" value="202">    LKMM-TM  </option>
                    <option class="level-1" value="1615">    Servant Leadership Training  </option>
                    <option class="level-1" value="263">    UKM  </option>
                    <option class="level-2" value="303">      BSO  </option>
                    <option class="level-2" value="1619">      EFM  </option>
                    <option class="level-2" value="273">      KSR  </option>
                    <option class="level-2" value="1617">      Matranak  </option>
                    <option class="level-2" value="1618">      Mena  </option>
                    <option class="level-2" value="1595">      UKM Paduan Suara  </option>
                    <option class="level-2" value="1612">      UKM Selam  </option>
                    <option class="level-2" value="264">      UKM Teater Rumpun Padi  </option>
                    <option class="level-0" value="265">Bank Panitia  </option>
                    <option class="level-0" value="76">BIG Events  </option>
                    <option class="level-1" value="147">    Community Outreach Program (COP)  </option>
                    <option class="level-1" value="1577">    Dies Natalis  </option>
                    <option class="level-1" value="388">    LKMM-TD  </option>
                    <option class="level-1" value="129">    Welcome Grateful Generation  </option>
                    <option class="level-2" value="159">      Open House  </option>
                    <option class="level-0" value="75">Events  </option>
                    <option class="level-1" value="611">    Eksternal  </option>
                    <option class="level-1" value="1604">    Office of Institutional Advance  </option>
                    <option class="level-1" value="309">    Pelantikan LK-KBM  </option>
                    <option class="level-1" value="549">    Pengabdian Masyarakat  </option>
                    <option class="level-1" value="128">    Pusat Karir  </option>
                    <option class="level-2" value="218">      Pre-Graduation Day Events  </option>
                    <option class="level-1" value="221">    Upacara Bendera  </option>
                </select>
            </div>

            <div class="mb-3">
                <label for="audience" class="form-label">For Who</label>
                <select name="audience" id="audience" class="form-control" required>
                    <option value="" disabled selected>Select Audience</option>
                    <option value="Public">Public</option>
                    <option value="Students">Mahasiswa UKP</option>
                    <option value="Teachers">Dosen</option>
                    <option value="Staff">Staf UKP</option>
                </select>
            </div>
    
            <div class="d-grid">
                <a href="{{ route('news.index')}}"></a>
                <button type="submit" class="btn btn-success">Submit News</button>
            </div>
        </form>

        @push('scripts')
        <script src="https://cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>
        <script>
            CKEDITOR.replace('description', {
                toolbar: [
                    { name: 'basicstyles', items: ['Bold', 'Italic', 'Underline', 'Strike'] },
                    { name: 'paragraph', items: ['NumberedList', 'BulletedList', '-', 'Outdent', 'Indent'] },
                    { name: 'styles', items: ['FontSize'] },
                    { name: 'clipboard', items: ['Undo', 'Redo'] },
                    { name: 'links', items: ['Link', 'Unlink'] },
                    { name: 'insert', items: ['Image', 'Table'] },
                    { name: 'tools', items: ['Maximize'] }
                ]
            });

            const maxWords = 600;

            CKEDITOR.instances.description.on('change', function () {
                const data = CKEDITOR.instances.description.getData();
                const text = data.replace(/<[^>]*>/g, ' ').replace(/ /g, ' ').trim();
                const words = text.split(/\s+/).filter(word => word.length > 0);
                const wordCount = words.length;

                const wordCountDisplay = document.getElementById('wordCount');
                if (wordCount > maxWords) {
                    wordCountDisplay.innerHTML = `<span class="text-danger">Word count: ${wordCount}/${maxWords} (exceeded!)</span>`;
                } else {
                    wordCountDisplay.innerHTML = `Word count: ${wordCount}/${maxWords}`;
                }
            });
        </script>
        @endpush

        <div class="mt-3 d-grid">
            <button id="saveDraftBtn" type="button" class="btn btn-secondary">Save as Draft</button>
        </div>
        
        <div id="draftStatus" class="mt-2"></div>
    </div>

    <script>
        const currentUserId = {{ auth()->id() }};

        document.addEventListener('DOMContentLoaded', function () {
            const summaryField = document.getElementById('summary');
            const summaryWordCountDisplay = document.getElementById('summaryWordCount');
            const maxSummaryWords = 80;

            summaryField.addEventListener('input', function () {
                const words = summaryField.value.trim().split(/\s+/).filter(word => word.length > 0);
                const wordCount = words.length;

                if (wordCount > maxSummaryWords) {
                    summaryField.value = words.slice(0, maxSummaryWords).join(' ');
                    summaryWordCountDisplay.textContent = `Word count: ${maxSummaryWords}/${maxSummaryWords}`;
                } else {
                    summaryWordCountDisplay.textContent = `Word count: ${wordCount}/${maxSummaryWords}`;
                }
            });

            const urlParams = new URLSearchParams(window.location.search);
            const draftId = urlParams.get('draft');
            
            if (draftId) {
                document.getElementById('draft_id').value = draftId;
                loadDraft(draftId);
            }

            // Add event listener for Save as Draft button
            document.getElementById('saveDraftBtn').addEventListener('click', saveDraft);
        });

        function saveDraft() {
            const draftIdField = document.getElementById('draft_id');
            const existingDraftId = draftIdField ? draftIdField.value : null;
            
            const formData = {
                id: existingDraftId || 'draft_' + Date.now(),
                title: document.getElementById('title').value,
                summary: document.getElementById('summary').value,
                description: CKEDITOR.instances.description.getData(), // Use CKEditor data
                start_date: document.getElementById('start_date').value,
                end_date: document.getElementById('end_date').value,
                image: document.getElementById('image').value,
                youtube_link: document.getElementById('youtube_link').value,
                category: document.getElementById('category').value,
                audience: document.getElementById('audience').value,
                saved_at: new Date().toLocaleString()
            };
            
            let userDrafts = JSON.parse(localStorage.getItem(`userDrafts_${currentUserId}`)) || [];
            
            if (existingDraftId) {
                const existingIndex = userDrafts.findIndex(draft => draft.id === existingDraftId);
                if (existingIndex !== -1) {
                    userDrafts[existingIndex] = formData;
                } else {
                    userDrafts.push(formData);
                }
            } else {
                userDrafts.push(formData);
            }
            
            localStorage.setItem(`userDrafts_${currentUserId}`, JSON.stringify(userDrafts));
            
            // Show success feedback
            const draftStatus = document.getElementById('draftStatus');
            draftStatus.innerHTML = '<div class="alert alert-success">Draft saved successfully! Redirecting to homepage...</div>';

            // Redirect after a short delay
            setTimeout(() => {
                window.location.href = '{{ route("news.index") }}';
            }, 1500);
        }
        
        function loadDraft(draftId) {
            const userDrafts = JSON.parse(localStorage.getItem(`userDrafts_${currentUserId}`)) || [];
            
            if (userDrafts.length === 0) return;
            
            let draftToLoad = userDrafts.find(draft => draft.id === draftId);
            
            if (draftToLoad) {
                document.getElementById('title').value = draftToLoad.title || '';
                document.getElementById('summary').value = draftToLoad.summary || '';
                CKEDITOR.instances.description.setData(draftToLoad.description || ''); // Load CKEditor content
                document.getElementById('start_date').value = draftToLoad.start_date || '';
                document.getElementById('end_date').value = draftToLoad.end_date || '';
                document.getElementById('youtube_link').value = draftToLoad.youtube_link || '';
                
                if (draftToLoad.category) {
                    document.getElementById('category').value = draftToLoad.category;
                }
                
                if (draftToLoad.audience) {
                    document.getElementById('audience').value = draftToLoad.audience;
                }
                
                let draftIdField = document.getElementById('draft_id');
                if (!draftIdField) {
                    const form = document.querySelector('form');
                    const hiddenInput = document.createElement('input');
                    hiddenInput.type = 'hidden';
                    hiddenInput.name = 'draft_id';
                    hiddenInput.id = 'draft_id';
                    hiddenInput.value = draftToLoad.id;
                    form.appendChild(hiddenInput);
                } else {
                    draftIdField.value = draftToLoad.id;
                }
            }
        }
    </script>
@endsection