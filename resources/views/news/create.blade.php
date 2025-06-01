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
                    <option class="level-1" value="202">&nbsp;&nbsp;&nbsp;&nbsp;LKMM-TM&nbsp;&nbsp;</option>
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
                    <option class="level-1" value="309">&nbsp;&nbsp;&nbsp;&nbsp;Pelantikan LK-KBM&nbsp;&nbsp;</option>
                    <option class="level-1" value="549">&nbsp;&nbsp;&nbsp;&nbsp;Pengabdian Masyarakat&nbsp;&nbsp;</option>
                    <option class="level-1" value="128">&nbsp;&nbsp;&nbsp;&nbsp;Pusat Karir&nbsp;&nbsp;</option>
                    <option class="level-2" value="218">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pre-Graduation Day Events&nbsp;&nbsp;</option>
                    <option class="level-1" value="221">&nbsp;&nbsp;&nbsp;&nbsp;Upacara Bendera&nbsp;&nbsp;</option>
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
                <button type="submit" class=" btn btn-success">Submit News</button>
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
                const text = data.replace(/<[^>]*>/g, ' ').replace(/&nbsp;/g, ' ').trim();
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
            <button id="saveDraftBtn" class="btn btn-secondary">Save as Draft</button>
        </div>
        
        <div id="draftStatus" class="mt-2"></div>
    </div>

    <script>
        const currentUserId = {{ auth()->id() }};

        function debugDraftIds() {
            const draftIdField = document.getElementById('draft_id');
            const userDrafts = JSON.parse(localStorage.getItem(`userDrafts_${currentUserId}`)) || []; 
            
            console.log("Current form draft ID:", userDrafts.map(d => d.id));
            console.log("Available draft IDs in storage:", userDrafts.map(d => d.id));
        }

        document.addEventListener('DOMContentLoaded', function () {
            const summaryField = document.getElementById('summary');
            const summaryWordCountDisplay = document.getElementById('summaryWordCount');
            const maxSummaryWords = 80;

            summaryField.addEventListener('input', function () {
                const words = summaryField.value.trim().split(/\s+/).filter(word => word.length > 0);
                const wordCount = words.length;

                if (wordCount > maxSummaryWords) {
                    // Trim the text to the maximum word limit
                    summaryField.value = words.slice(0, maxSummaryWords).join(' ');
                    summaryWordCountDisplay.textContent = `Word count: ${maxSummaryWords}/${maxSummaryWords}`;
                } else {
                    summaryWordCountDisplay.textContent = `Word count: ${wordCount}/${maxSummaryWords}`;
                }
            });
        });
        
        document.addEventListener('DOMContentLoaded', function() {
            debugDraftIds();
            const urlParams = new URLSearchParams(window.location.search);
            const newForm = urlParams.get('new');
            const draftId = urlParams.get('draft');
            
            // Add a hidden field to track which draft is being edited
            if (draftId) {
                document.getElementById('draft_id').value = draftId;
                const form = document.querySelector('form');
                const hiddenInput = document.createElement('input');
                hiddenInput.type = 'hidden';
                hiddenInput.name = 'draft_id';
                hiddenInput.id = 'draft_id';
                hiddenInput.value = draftId;
                form.appendChild(hiddenInput);
                
                // Load the specific draft
                loadDraft(draftId);
            } else if (newForm !== 'true') {
                // If not a new form and no specific draft, load the most recent
                loadDraft();
            }
            
            // Modify the form submission event listener to remove the draft
            document.querySelector('form').addEventListener('submit', function(event) {
                const draftIdField = document.getElementById('draft_id');
                const urlParams = new URLSearchParams(window.location.search);
                const submittedDraftId = urlParams.get('submitted_draft_id');

                if (submittedDraftId) {
                    // Remove the draft that was successfully submitted
                    console.log("Found submitted draft ID in URL:", submittedDraftId);
                    removeDraftAfterSubmission(submittedDraftId);
                    
                    // Show success message
                    const draftStatus = document.getElementById('draftStatus');
                    draftStatus.innerHTML = '<div class="alert alert-success">News item submitted successfully! Draft has been removed.</div>';
                    
                    // Clear the URL parameter
                    window.history.replaceState({}, document.title, window.location.pathname);
                    
                    setTimeout(() => {
                        draftStatus.innerHTML = '';
                    }, 5000);
                }
                
                if (draftIdField && draftIdField.value) {
                    // Always prevent default first to ensure our code runs
                    event.preventDefault();
                    
                    const targetId = draftIdField.value;
                    console.log("Attempting to remove draft with ID:", targetId);
                    
                    try {
                        // Get current drafts
                        const userDrafts = JSON.parse(localStorage.getItem(`userDrafts_${currentUserId}`)) || [];
                        console.log("Before removal - drafts count:", userDrafts.length);
                        console.log("Available draft IDs:", userDrafts.map(d => d.id === draftId));
                        
                        // Find the index of the draft with matching ID
                        const indexToRemove = userDrafts.findIndex(draft => draft.id === targetId);
                        console.log("Draft index to remove:", indexToRemove);
                        
                        // If found, remove it
                        if (indexToRemove !== -1) {
                            userDrafts.splice(indexToRemove, 1);
                            localStorage.setItem(`userDrafts_${currentUserId}`, JSON.stringify(userDrafts));
                            console.log("Draft removed, remaining count:", userDrafts.length);
                        } else {
                            console.log("Draft ID not found in storage!");
                        }
                        
                        // Submit the form after a longer delay to ensure localStorage updates
                        setTimeout(() => {
                            console.log("Now submitting form...");
                            this.submit();
                        }, 500);
                    } catch (error) {
                        console.error("Error in draft removal:", error);
                        // Submit anyway if there's an error
                        this.submit();
                    }
                }
            });
            
            document.getElementById('saveDraftBtn').addEventListener('click', function() {
                saveDraft();
            });
        });

        function removeDraftAfterSubmission(draftId) {
            console.log("Removing draft after submission:", draftId);
            let userDrafts = JSON.parse(localStorage.getItem(`userDrafts_${currentUserId}`)) || [];
            
            if (draftId) {
                // Remove specific draft
                const beforeCount = userDrafts.length;
                userDrafts = userDrafts.filter(draft => draft.id !== draftId);
                console.log(`Removed draft ${draftId}: Before: ${beforeCount}, After: ${userDrafts.length}`);
            } else {
                // If no specific ID, just remove the most recent draft
                if (userDrafts.length > 0) {
                    const removedDraft = userDrafts.pop();
                    console.log("Removed most recent draft:", removedDraft.id);
                }
            }
            
            localStorage.setItem(`userDrafts_${currentUserId}`, JSON.stringify(userDrafts));
        }
        
        function saveDraft() {
            // First check if we're editing an existing draft
            const draftIdField = document.getElementById('draft_id');
            const existingDraftId = draftIdField ? draftIdField.value : null;
            
            const formData = {
                id: existingDraftId || 'draft_' + Date.now(), 
                title: document.getElementById('title').value,
                summary: document.getElementById('summary').value,
                description: document.getElementById('description').value,
                start_date: document.getElementById('start_date').value,
                end_date: document.getElementById('end_date').value,
                image: document.getElementById('image').value, 
                youtube_link: document.getElementById('youtube_link').value,
                category: document.getElementById('category').value,
                audience: document.getElementById('audience').value,
                saved_at: new Date().toLocaleString()
            };
            
            // Get existing drafts or initialize empty array
            let userDrafts = JSON.parse(localStorage.getItem(`userDrafts_${currentUserId}`)) || [];
            
            if (existingDraftId) {
                // Update existing draft
                const existingIndex = userDrafts.findIndex(draft => draft.id === existingDraftId);
                if (existingIndex !== -1) {
                    userDrafts[existingIndex] = formData;
                } else {
                    // If somehow the ID exists in form but not in storage, add as new
                    userDrafts.push(formData);
                }
            } else {
                // Add new draft
                userDrafts.push(formData);
            }
            
            // Save back to localStorage
            localStorage.setItem(`userDrafts_${currentUserId}`, JSON.stringify(userDrafts));
            
            // Clear all form fields manually to ensure complete reset
            document.getElementById('title').value = '';
            document.getElementById('summary').value = '';
            document.getElementById('description').value = '';
            document.getElementById('start_date').value = '';
            document.getElementById('end_date').value = '';
            document.getElementById('youtube_link').value = '';
            document.getElementById('image').value = '';
            
            // Reset select elements to their first option
            const categorySelect = document.getElementById('category');
            categorySelect.selectedIndex = 0;
            
            const audienceSelect = document.getElementById('audience');
            audienceSelect.selectedIndex = 0;
            
            // Remove the hidden draft_id field if it exists
            if (draftIdField) {
                draftIdField.remove();
            }
            
            // Show success message
            const draftStatus = document.getElementById('draftStatus');
            draftStatus.innerHTML = '<div class="alert alert-success">Draft saved successfully! Redirecting to homepage...</div>';
            
            // Redirect to homepage after a short delay
            setTimeout(() => {
                window.location.href = '{{ route("news.index") }}';
            }, 1500);
        }
        
        function loadDraft(draftId) {
            const userDrafts = JSON.parse(localStorage.getItem(`userDrafts_${currentUserId}`)) || [];
            
            if (userDrafts.length === 0) return;
            
            let draftToLoad;
            
            if (draftId) {
                // Find the specific draft by ID
                draftToLoad = userDrafts.find(draft => draft.id === draftId);
            } else {
                // Otherwise load the most recent draft
                draftToLoad = userDrafts[userDrafts.length - 1];
            }
            
            if (draftToLoad) {
                document.getElementById('title').value = draftToLoad.title || '';
                document.getElementById('summary').value = draftToLoad.summary || '';
                document.getElementById('description').value = draftToLoad.description || '';
                document.getElementById('start_date').value = draftToLoad.start_date || '';
                document.getElementById('end_date').value = draftToLoad.end_date || '';
                document.getElementById('image').value = ''; 
                document.getElementById('youtube_link').value = draftToLoad.youtube_link || '';
                
                if (draftToLoad.category) {
                    document.getElementById('category').value = draftToLoad.category;
                }
                
                if (draftToLoad.audience) {
                    document.getElementById('audience').value = draftToLoad.audience;
                }
                
                // Store the draft ID if it exists
                if (draftToLoad.id) {
                    let draftIdField = document.getElementById('draft_id');
                    if (!document.getElementById('draft_id')) {
                        const form = document.querySelector('form');
                        const hiddenInput = document.createElement('input');
                        hiddenInput.type = 'hidden';
                        hiddenInput.name = 'draft_id';
                        hiddenInput.id = 'draft_id';
                        hiddenInput.value = draftToLoad.id;
                        form.appendChild(hiddenInput);
                    } else {
                        document.getElementById('draft_id').value = draftToLoad.id;
                    }
                }
            }
        }

        function clearDraft(draftId) {
            if (!draftId) {
                // Clear all drafts
                localStorage.removeItem(`userDrafts_${currentUserId}`);
                document.querySelector('form').reset();
                
                const draftStatus = document.getElementById('draftStatus');
                draftStatus.innerHTML = '<div class="alert alert-warning">All drafts cleared!</div>';
            } else {
                // Remove specific draft
                let userDrafts = JSON.parse(localStorage.getItem(`userDrafts_${currentUserId}`)) || [];
                userDrafts = userDrafts.filter(draft => draft.id !== draftId);
                localStorage.setItem(`userDrafts_${currentUserId}`, JSON.stringify(userDrafts));
                
                document.querySelector('form').reset();
                
                const draftStatus = document.getElementById('draftStatus');
                draftStatus.innerHTML = '<div class="alert alert-warning">Draft removed!</div>';
            }
            
            setTimeout(() => {
                draftStatus.innerHTML = '';
            }, 3000);
        }
    </script>
@endsection