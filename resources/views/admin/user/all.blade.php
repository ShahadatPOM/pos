@extends('layouts.admin.master')
@section('master.content')
<div class="container">
    <h2>All Users</h2>
    <hr>
    <a href="{{ route('user.create') }}" class="btn btn-info ml-3">Add New</a>
    <br><br>

    <table class="table table-bordered table-striped" id="user_table">
        <thead>
            <tr>
                <th class="text-center" width="5%">ID</th>
                <th class="text-center" width="15%">Image</th>
                <th class="text-center" width="15%">Name</th>
                <th class="text-center" width="15%">Email</th>
                <th class="text-center" width="15%">Status</th>
                <th class="text-center" width="10%">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>
                    <img class=" img-fluid" style="width: 50px" src="{{ asset('profile/'. $user->image) }}" alt="user image">
                </td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    @if($user->status == 1)
                    <span class="badge badge-warning">Active</span>
                    @else
                    <span class="badge badge-danger">Inactive</span>
                    @endif
                </td>
                <td class="text-center">
                    <a href="{{ route('user.profile', $user->id) }}" class="btn btn-sm btn-warning" title="edit"><i class="fa fa-edit"></i></a>
                    <form action="{{ route('user.delete', $user->id) }}" method="post"
                        style="display: inline-block">
                    
                        @csrf
                        <button onclick="alert('Are You Sure to DELETE!')" class="btn btn-sm btn-danger"><i
                                class="fas fa-trash"></i></button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@push('base.js')
    <script>
            $('#user_table').DataTable();
    </script>
@endpush
@endsection
