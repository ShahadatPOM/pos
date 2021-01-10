@extends('layouts.admin.master')
@section('master.content')
<div class="container">
    <h2>Reservations</h2>
    <hr>
    <a href="{{ route('reservation.create') }}" class="btn btn-info ml-3">Add New</a>
    <br><br>

    <table class="table table-bordered table-striped" id="reservation_table">
        <thead>
            <tr>
                <th class="text-center" width="5%">ID</th>
                <th class="text-center" width="15%">Customer Name</th>
                <th class="text-center" width="15%">Mobile</th>
                <th class="text-center" width="15%">Email</th>
                <th class="text-center" width="15%">Persons</th>
                <th class="text-center" width="15%">Start Time</th>
                <th class="text-center" width="15%">End Time</th>
                <th class="text-center" width="15%">Date</th>
                <th class="text-center" width="15%">Table No</th>
                <th class="text-center" width="15%">Status</th>
                <th class="text-center" width="10%">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($reservations as $reservation)
            <tr>
                <td>{{ $reservation->id }}</td>
                <td>{{ $reservation->name }}</td>
                <td>{{ $reservation->mobile }}</td>
                <td>{{ $reservation->email }}</td>
                <td>{{ $reservation->no_of_person }}</td>
                <td>{{ $reservation->start_time }}</td>
                <td>{{ $reservation->end_time }}</td>
                <td>{{ $reservation->date }}</td>
                <td>{{ $reservation->table_no }}</td>
                <td>
                    @if($reservation->status == 1)
                    <span class="badge badge-warning">Active</span>
                    @else
                    <span class="badge badge-danger">Inactive</span>
                    @endif
                </td>
                <td class="text-center">
                    <a href="{{ route('reservation.edit', $reservation->id) }}" class="btn btn-sm btn-warning" title="edit"><i class="fa fa-edit"></i></a>
                    <form action="{{ route('reservation.delete', $reservation->id) }}" method="post"
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
            $('#reservation_table').DataTable();
    </script>
@endpush
@endsection
