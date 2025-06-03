@extends('admin.news.layout')

@section('title', 'Kelola Role Pengguna')

@section('content')
<div class="container">


    {{-- flash message --}}
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="table-responsive">
        <table class="table table-striped align-middle">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Role Saat Ini</th>
                    <th class="text-center">Action</th>
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
                        <form method="POST" action="{{ route('admin.updateRole', $u->id) }}">
                        @csrf
                        @method('PATCH')
                        <select name="role" class="form-select">
                            <option value="user" {{ $u->role === 'user' ? 'selected' : '' }}>User</option>
                            <option value="penyelenggara" {{ $u->role === 'penyelenggara' ? 'selected' : '' }}>Penyelenggara</option>
                        </select>
                        <button type="submit" class="btn btn-primary">Update Role</button>
                    </form>

                    </td>
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
@endsection
