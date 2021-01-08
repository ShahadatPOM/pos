@extends('layouts.admin.master')
@section('master.content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <div class="card mt-3">
                    <div class="card-header">
                        <h4>Add Category</h4>
                        <small><span style="color: red">*</span>Indicates Required Field</small>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                        <div class="col-12">
                            <form action="{{ route('category.update', $category->id) }}" enctype="multipart/form-data" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="name">Category Name</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" value="{{ $category->categoryName }}" name="categoryName">
                                    </div>
                                </div>
            
                                <div class="form-group">
                                    <label>Category Image</label>
                                    <div class="col-sm-12">
                                        <input type="file" class="form-control" name="cat_image">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Status</label>
                                    <div class="col-sm-12">
                                        <select class="form-control" name="status">
                                            <option value="1" @if($category->status == 1) selected @endif>Active</option>
                                            <option value="0" @if($category->status == 0) selected @endif>Inactive</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-primary">Update</button>
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

