@extends('base.base')

@section('title', 'My Drafts')

@section('content')
<div class="container">
    <h2 class="mb-4">My Saved Drafts</h2>
    
    <div id="draftsList" class="mt-4">
        <div class="text-center py-5">
            <div class="spinner-border text-primary" role="status">
                <span class="visually-hidden">Loading drafts...</span>
            </div>
        </div>
    </div>
    
    <div class="mt-4 d-flex justify-content-between">
        <div id="clearButtonContainer"></div>
    </div>
</div>

<script>
    const currentUserId = {{ auth()->id() }};
    
    document.addEventListener('DOMContentLoaded', function() {
        // Check if this is a newly registered user
        checkUserRegistration();
        // Check for submitted draft from URL parameter
        checkSubmittedDraft();
        loadDrafts();
    });
    
    function checkUserRegistration() {
        // Store user IDs that have accessed the system
        let knownUsers = JSON.parse(localStorage.getItem('knownUserIds') || '[]');
        
        // If this user ID is not in the known users list
        if (!knownUsers.includes(currentUserId)) {
            // Add the user to known users
            knownUsers.push(currentUserId);
            localStorage.setItem('knownUserIds', JSON.stringify(knownUsers));
            
            // Clear any potential drafts for this user ID from a previous account
            localStorage.removeItem(`userDrafts_${currentUserId}`);
            console.log("New user detected, cleared any previous drafts");
        }
    }
    
    function checkSubmittedDraft() {
    const urlParams = new URLSearchParams(window.location.search);
    const submittedDraftId = urlParams.get('submittedDraft');
    if (submittedDraftId) {
        let userDrafts = JSON.parse(localStorage.getItem(`userDrafts_${currentUserId}`)) || [];
        userDrafts = userDrafts.filter(draft => draft.id !== submittedDraftId);
        localStorage.setItem(`userDrafts_${currentUserId}`, JSON.stringify(userDrafts));
        window.history.replaceState({}, document.title, window.location.pathname);
    }
}
    
    function loadDrafts() {
        const draftsList = document.getElementById('draftsList');
        const clearButtonContainer = document.getElementById('clearButtonContainer');
        const userDrafts = JSON.parse(localStorage.getItem(`userDrafts_${currentUserId}`)) || [];
        
        if (userDrafts.length > 0) {
            clearButtonContainer.innerHTML = `
                <button id="clearAllBtn" class="btn btn-outline-danger">
                    <i class="fas fa-trash"></i> Clear All Drafts
                </button>
            `;
            
            // Add event listener to the button
            document.getElementById('clearAllBtn').addEventListener('click', function() {
                if (confirm('Are you sure you want to delete all drafts?')) {
                    localStorage.removeItem(`userDrafts_${currentUserId}`);
                    loadDrafts();
                }
            });
            
            let html = '';
            
            // Sort drafts by saved time (most recent first)
            userDrafts.sort((a, b) => new Date(b.saved_at) - new Date(a.saved_at));
            
            // Create draft cards
            for (const draft of userDrafts) {
                html += `
                    <div class="card mb-3 shadow-sm">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <h5 class="card-title">${draft.title || 'Untitled Draft'}</h5>
                                <span class="badge bg-secondary">Saved: ${draft.saved_at || 'Unknown time'}</span>
                            </div>
                            
                            <p class="card-text">${(draft.description || '').substring(0, 150)}${draft.description && draft.description.length > 150 ? '...' : ''}</p>
                            
                            <div class="d-flex mt-3 gap-2">
                                <a href="{{ route('news.create') }}?draft=${draft.id}" class="btn btn-primary">
                                    <i class="fas fa-edit"></i> Continue Editing
                                </a>
                                <button onclick="removeDraft('${draft.id}')" class="btn btn-outline-danger">
                                    <i class="fas fa-trash"></i> Delete Draft
                                </button>
                            </div>
                        </div>
                    </div>
                `;
            }
            
            draftsList.innerHTML = html;
        } else {
            // Clear the button container when no drafts exist
            clearButtonContainer.innerHTML = '';
            
            draftsList.innerHTML = `
                <div class="alert alert-warning">
                    <i class="fas fa-exclamation-triangle"></i> You don't have any saved drafts.
                </div>
            `;
        }
    }
    
    function removeDraft(draftId) {
        if (confirm('Are you sure you want to delete this draft?')) {
            let userDrafts = JSON.parse(localStorage.getItem(`userDrafts_${currentUserId}`)) || [];
            userDrafts = userDrafts.filter(draft => draft.id !== draftId);
            localStorage.setItem(`userDrafts_${currentUserId}`, JSON.stringify(userDrafts));
            loadDrafts();
        }
    }
</script>
@endsection