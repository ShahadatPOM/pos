@extends('layouts.admin.master')
@section('master.content')
<div class="container">
    <h2>Complete Orders</h2>
    <hr>
    {{--  <a href="{{ route('category.create') }}" class="btn btn-info ml-3">Add New</a>  --}}
    <br><br>
    
    <table class="table table-bordered table-striped" id="order_table">
        <thead>
            <tr>
                <th class="text-center" width="5%">ID</th>
                <th class="text-center" width="15%">Order Token</th>
                <th class="text-center" width="15%">Order Total</th>
                <th class="text-center" width="15%">Status</th>
                <th class="text-center" width="10%">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
            <tr>
                <td>{{ $order->id }}</td>
                <td>{{ $order->orderToken }}</td>
                <td>{{ $order->orderTotal }}</td>
                <td>{{ $order->status }}</td>
                <td class="text-center">
                    <a href="{{ route('order.edit', $order->id) }}" class="btn btn-sm btn-warning" title="edit"><i class="fa fa-edit"></i></a>
                    <a href="{{ route('order.details', $order->id) }}" class="btn btn-sm btn-info" title="details"><i class="fa fa-eye"></i></a>

                    <form action="{{ route('order.delete', $order->id) }}" method="post"
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
