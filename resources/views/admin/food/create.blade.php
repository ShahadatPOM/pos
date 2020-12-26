@extends('layouts.admin.master')
@section('master.content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <div class="card mt-3">
                    <div class="card-header">
                        <h4>Add Food</h4>
                        <small><span style="color: red">*</span>Indicates Required Field</small>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                        <div class="col-12">
                            <form action="{{ route('food.store') }}" method="post" enctype="multipart/form-data" >
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Category</label>
                                        <select class="form-control" name="fkcategory_id">
                                            <option selected disabled>Select Category</option>
                                            @foreach($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->categoryName }}</option>                                                
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Food Name</label>
                                        <input type="text" class="form-control" name="foodName" placeholder="Food Name">
                                        @error('foodName')
                                        <div class="alert alert-danger mt-2 mb-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Component</label>
                                        <input type="text" class="form-control" name="component" placeholder="Add Component">
                                        @error('component')
                                        <div class="alert alert-danger mt-2 mb-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Notes</label>
                                        <input type="text" class="form-control" name="notes" placeholder="Add notes">
                                        @error('notes')
                                        <div class="alert alert-danger mt-2 mb-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Description</label>
                                        <input type="text" class="form-control" name="description" placeholder="Add description">
                                        @error('description')
                                        <div class="alert alert-danger mt-2 mb-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    
                                    <div class="row" id="dynamicAddRemove">
                                        <div class="col-5">
                                            <div class="form-group">
                                                <label>Your/Author Name</label>
                                                <input type="text" class="form-control" name="name[]"
                                                    placeholder="Enter name">
                                                @error('name')
                                                <div class="alert alert-danger mt-2 mb-2">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label>Author Email</label>
                                                <input type="email" class="form-control" name="email[]"
                                                    placeholder="Enter email">
                                                @error('email')
                                                <div class="alert alert-danger mt-2 mb-2">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-1">
                                            <div style="margin: 30px 0 0 30px;">
                                                <button type="button" name="add" id="ad-btn" class="btn btn-success"><i class="fa fa-plus"></i></button>
                                                {{-- <button class="btn btn-success btn-sm"><i class="fa fa-plus"></i></button> --}}
                                            </div>
                                        </div>
                                    </div>
                                    <div id="newRow"></div>
                                    <div class="form-group">
                                        <label>Summery</label>
                                        <textarea name="summery" id="summery" class="form-control"
                                            placeholder="Write your abstract here"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Menuscript Category</label>
                                        <select class="form-control" name="category_id">
                                            <option selected disabled>Select Category</option>
                                            @foreach($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>                                                
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Your Country</label>
                                        <select class="form-control" name="country_id">
                                            <option selected disabled>Select Country</option>
                                            <option value="1">Bangladesh</option>
                                            <option value="2">India</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Upload Manuscript</label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="paper_file">
                                       
                                            <label class="custom-file-label">Choose file</label>
                                        </div>
                                        @error('paper_file')
                                        <div class="alert alert-danger mt-2 mb-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div>
                                        <button type="submit" class="btn btn-md btn-primary">Submit</button>
                                        <a href="#" class="btn btn-md btn-info">Back</a>
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

