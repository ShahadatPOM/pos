@extends('layouts.admin.master')
@section('master.content')
<div class="container">
    <h2>Food Variants</h2>
    <hr>
    <a href="{{ route('variant.create') }}" class="btn btn-info ml-3">Add New</a>
    <br><br>

    <table class="table table-bordered table-striped" id="food_datatable">
        <thead>
            <tr>
                <th class="text-center" width="5%">ID</th>
                <th class="text-center" width="15%">Food</th>
                <th class="text-center" width="15%">Variant</th>
                <th class="text-center" width="25%">Price</th>
                <th class="text-center" width="15%">Status</th>
                <th class="text-center" width="10%">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($variants as $variant)
            <tr>
                <td>{{ $variant->id }}</td>                
                <td>{{ $variant->food->foodName }}</td>
                <td>{{ $variant->variantName }}</td>
                <td>{{ $variant->price }}<small>tk</small></td>              
                <td>
                    @if($variant->status == 1)
                    <span class="badge badge-warning">Active</span>
                    @else
                    <span class="badge badge-warning">Inactive</span>
                    @endif
                </td>
                <td class="text-center">
                    <a href="{{ route('variant.edit', $variant->id) }}" class="btn btn-sm btn-warning" title="edit"><i class="fa fa-edit"></i></a>
                    <form action="{{ route('variant.delete', $variant->id) }}" method="post" style="display: inline-block">
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
            $('#food_datatable').DataTable();
    </script>

@endpush
@endsection
