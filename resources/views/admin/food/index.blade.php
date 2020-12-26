@extends('layouts.admin.master')
@section('master.content')
<div class="container">
    <h2>Food Categories</h2>
    <hr>
    <a href="{{ route('food.create') }}" class="btn btn-info ml-3">Add New</a>
    <br><br>

    <table class="table table-bordered table-striped" id="food_datatable">
        <thead>
            <tr>
                <th class="text-center" width="5%">ID</th>
                <th class="text-center" width="15%">Image</th>
                <th class="text-center" width="15%">Category</th>
                <th class="text-center" width="15%">Food</th>
                <th class="text-center" width="25%">Vat</th>
                <th class="text-center" width="15%">Status</th>
                <th class="text-center" width="10%">Action</th>
            </tr>
        </thead>
        <tbody>
            @if($foods)
            @foreach($foods as $food)
            <tr>
                <td>{{ $food->id }}</td>
                <td>
                    <img class=" img-fluid" style="width: 50px" src="{{ asset('food/'. $food->food_image) }}" alt="Food image">
                    {{--  <img style="width: 50px" src="{{ url('public/food', $food->food_image) }}" alt="Food image">  --}}
                </td>
                <td>{{ $food->category->categoryName }}</td>
                <td>{{ $food->foodName }}</td>
                <td>{{ $food->vat }}%</td>
              
                <td>
                    @if($food->status == 1)
                    <span class="badge badge-warning">Active</span>
                    @else
                    <span class="badge badge-warning">Inactive</span>
                    @endif
                </td>
                <td class="text-center">
                    <a href="#" class="btn btn-sm btn-success" title="view"><i class="fa fa-eye"></i></a>
                </td>
            </tr>
            @endforeach
            @else
            <tr>
                <td colspan="7" style="text-align: center; color: grey">No pending menuscript found</td>
            </tr>
            @endif

        </tbody>
    </table>
</div>

@push('base.js')
    <script>
            $('#food_datatable').DataTable();
    </script>

@endpush
@endsection
