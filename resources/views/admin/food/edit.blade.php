@extends('layouts.admin.master')
@section('master.content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <div class="card mt-3">
                    <div class="card-header">
                        <h4>Edit Food</h4>
                        <small><span style="color: red">*</span>Indicates Required Field</small>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                        <div class="col-12">
                            <form action="{{ route('food.update', $food->id) }}" method="post" enctype="multipart/form-data" >
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Category</label>
                                        <select class="form-control" name="fkcategory_id">
                                            <option disabled>Select Category</option>
                                            @foreach($categories as $category)
                                            <option @if($food->fkcategory_id == $category->id) selected @endif value="{{ $category->id }}">{{ $category->categoryName }}</option>                                                
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Food Name</label>
                                        <input type="text" class="form-control" value="{{ $food->foodName }}" name="foodName" placeholder="Food Name">
                                        @error('foodName')
                                        <div class="alert alert-danger mt-2 mb-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Notes</label>
                                        <input type="text" class="form-control" value="{{ $food->notes }}" name="notes" placeholder="Add notes">
                                        @error('notes')
                                        <div class="alert alert-danger mt-2 mb-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Description</label>
                                        <input type="text" class="form-control" value="{{ $food->Description }}" name="description" placeholder="Add description">
                                        @error('description')
                                        <div class="alert alert-danger mt-2 mb-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Vat</label>
                                        <input type="number" class="form-control" value="{{ $food->vat }}" name="vat" placeholder="Add vat">
                                        @error('vat')
                                        <div class="alert alert-danger mt-2 mb-2">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label>Food Status</label>
                                        <select class="form-control" name="status">
                                            <option selected disabled>Select Status</option>
                                            <option @if($food->status == 1) selected @endif value="1">Active</option>
                                            <option @if($food->status == 0) selected @endif value="0">Inactive</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Upload Image</label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="food_image">
                                       
                                            <label class="custom-file-label">Choose file</label>
                                        </div>
                                        @error('food_image')
                                        <div class="alert alert-danger mt-2 mb-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div>
                                        <button type="submit" class="btn btn-md btn-primary">Update</button>
                                        <a href="{{ route('food.index') }}" class="btn btn-md btn-info">Back</a>
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

