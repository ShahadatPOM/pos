@extends('layouts.admin.master')
@section('master.content')
<div class="container">
    <h2>Order Details</h2>
    <hr>
    {{--  <a href="{{ route('category.create') }}" class="btn btn-info ml-3">Add New</a>  --}}
    <br><br>

    <table class="table table-bordered table-striped" id="order_table">
        <thead>
            <tr>
                <th class="text-center" width="5%">ID</th>
                <th class="text-center" width="15%">Food Name</th>
                <th class="text-center" width="15%">Price</th>
                <th class="text-center" width="15%">Quantity</th>
                <th class="text-center" width="15%">Total</th>
                <th class="text-center" width="10%">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orderItems as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->itemName }}</td>
                <td>{{ $item->itemPrice }}</td>
                <td>{{ $item->quantity }}</td>
                <td>{{ $item->total }}</td>
                <td class="text-center">
                    <a href="{{ route('order.item.edit', $item->id) }}" class="btn btn-sm btn-warning" title="edit"><i class="fa fa-edit"></i></a>

                    <form action="{{ route('order.item.delete', $item->id) }}" method="post"
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
            $('#order_table').DataTable();
    </script>
@endpush
@endsection
