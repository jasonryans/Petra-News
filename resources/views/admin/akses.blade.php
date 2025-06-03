@extends('admin.news.layout')

@section('title', 'Kelola Role Pengguna')

@section('content')
<div class="container">


    {{-- flash message --}}
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <div class="table-responsive">
        <table class="table table-bordered table-striped align-middle">
            <thead class="table-dark">
                <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Nama</th>
                    <th class="text-center">Email</th>
                    <th class="text-center">Role Saat Ini</th>
                    <th class="text-center">Action</th>
                    <th class="text-center">Role Expired At</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($users as $index => $u)
                <tr>
                    <td>{{ $loop->iteration + ($users->currentPage()-1)*$users->perPage() }}</td>
                    <td>{{ $u->name }}</td>
                    <td>{{ $u->email }}</td>
                    <td><span class="badge bg-info text-dark">{{ ucfirst($u->role) }}</span></td>
                    <td class="text-center">
                        <form method="POST" action="{{ route('admin.updateRole', $u->id) }}" class="role-form">
                            @csrf
                            @method('PATCH')
                            <select name="role" class="form-select role-select" data-user-id="{{ $u->id }}">
                                <option value="user" {{ $u->role === 'user' ? 'selected' : '' }}>User</option>
                                <option value="penyelenggara" {{ $u->role === 'penyelenggara' ? 'selected' : '' }}>Penyelenggara</option>
                            </select>
                            <button type="submit" class="btn btn-primary">Update Role</button>
                        </form>
                    </td>
                    <td>{{$u->role_expired_at}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    {{-- pagination --}}
    <div class="d-flex justify-content-end">
        {{ $users->links() }}
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="expiredDateModal" tabindex="-1" aria-labelledby="expiredDateModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form id="roleUpdateForm" method="POST">
      @csrf
      @method('PATCH')
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Set Expired Date</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <label for="expired_date" class="form-label">Expired Date</label>
          <input type="date" name="expired_date" id="expired_date" class="form-control" required>
          <input type="hidden" name="role" value="penyelenggara">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-primary">Confirm</button>
        </div>
      </div>
    </form>
  </div>
</div>

<script>
document.querySelectorAll('.role-select').forEach(select => {
    select.addEventListener('change', function(e) {
        const selectedRole = e.target.value;
        const form = e.target.closest('form');
        const action = form.getAttribute('action');

        if (selectedRole === 'penyelenggara') {
            e.preventDefault();

            // Set form action
            const modalForm = document.getElementById('roleUpdateForm');
            modalForm.setAttribute('action', action);

            // Show modal
            const modal = new bootstrap.Modal(document.getElementById('expiredDateModal'));
            modal.show();
        }
    });
});

</script>
@endsection
