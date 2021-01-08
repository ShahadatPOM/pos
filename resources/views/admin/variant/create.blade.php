@extends('layouts.admin.master')
@section('master.content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <div class="card mt-3">
                    <div class="card-header">
                        <h4>Add Variant</h4>
                        <small><span style="color: red">*</span>Indicates Required Field</small>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                        <div class="col-12">
                            <form action="{{ route('variant.store') }}" method="post" enctype="multipart/form-data" >
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Food</label>
                                        <select class="form-control" name="fkfood_id">
                                            <option selected disabled>Select Food</option>
                                            @foreach($foods as $food)
                                            <option value="{{ $food->id }}">{{ $food->foodName }}</option>                                                
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Variant Name</label>
                                        <input type="text" class="form-control" name="variantName" placeholder="Variant Name">
                                        @error('variantName')
                                        <div class="alert alert-danger mt-2 mb-2">{{ $message }}</div>
                                        @enderror
                                    </div>                                                            
                                    <div class="form-group">
                                        <label>Price</label>
                                        <input type="number" class="form-control" name="price" placeholder="Add price">
                                        @error('price')
                                        <div class="alert alert-danger mt-2 mb-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Status</label>
                                        <select class="form-control" name="status">
                                            <option selected disabled>Select Status</option>
                                            <option value="1">Active</option>
                                            <option value="0">Inactive</option>
                                        </select>
                                    </div>                                
                                    <div>
                                        <button type="submit" class="btn btn-md btn-primary">Submit</button>
                                        <a href="{{ route('variant.index') }}" class="btn btn-md btn-info">Back</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('base.js')
    <script>
        $('#ad-btn').click(function(){
            $('#newRow').append($( "<div class='row' id='dynamic'><div class='col-5'> <div class='form-group'><input type='text'"
                 +"class='form-control' name='name[]' placeholder='Enter name'></div></div><div class='col-6'><div class='form-group'>"
                     +"<input type='email' class='form-control' name='email[]' placeholder='Enter email'></div></div><div class='col-1'>"
                         +"<div style='margin: 4px 0 0 30px;'><button type='button' onclick='removebtn()' name='remove' id='remove' class='btn btn-danger'>"
                             +"<i class='fa fa-minus'></i></button></div></div></div>"));
        });

        function removebtn(){
            $('#dynamic').remove();
        }
    </script>
@endpush

