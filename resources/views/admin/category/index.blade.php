@extends('layouts.admin.master')
@section('master.content')
<div class="container">
    <h2>All Category</h2>
    <hr>
    <a href="javascript:void(0)" class="btn btn-info ml-3" id="createNewCategory">Add New</a>
    <br><br>

    <table class="table table-bordered table-striped" id="category_datatable">
        <thead>
            <tr>
                <th>ID</th>
                <th>S. No</th>
                <th>Category Name</th>
                <th>Parent Category</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
    </table>
</div>

<div class="modal fade modal-md " id="categoryModal">
    <div class="modal-dialog modal-lg ">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="categoryModalTitle"></h4>
            </div>
            <div class="modal-body">
                <form id="categoryForm" name="categoryForm" class="form-horizontal">
                    @csrf
                    <input type="hidden" name="category_id" id="category_id">
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">Category Name</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="" name="categoryName" placeholder="Enter Tilte"
                                value="" maxlength="50">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Image</label>
                        <div class="col-sm-12">
                            <input type="file" class="form-control" id="" name="cat_image"
                                placeholder="Enter Description" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Status</label>
                        <div class="col-sm-12">
                            <select class="form-control" name="status">
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-primary" id="saveBtn"></button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">

            </div>
        </div>
    </div>
</div>

{{--  modal end  --}}

{{--  javascript  --}}
@push('base.js')
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
<script>
    var SITEURL = '{{URL::to('')}}';
    $(document).ready(function () {
                $('#category_datatable').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: {
                        url: SITEURL + "category",
                        type: 'GET',
                    },
                    columns: [
                        {data: 'id', name: 'id','visible': false},
                        {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
                        {data: 'categoryName', name: 'categoryName'},
                        {data: 'parent_cat_id', name: 'parent_cat_id'},
                        {data: 'status', name: 'status'},
                        {data: 'action', name: 'action', orderable: false},
                    ],
                    order: [
                        [0, 'desc']
                    ]
                });

                /*  When user click add user button */
                $('#createNewCategory').click(function () {
                    $('#categoryForm').trigger("reset");
                    $('#saveBtn').html("create");
                    $('#categoryModalTitle').html("Add New Category");
                    $('#categoryModal').modal('show');
                });

           

            if ($("#categoryForm").length > 0) {
                $("#categoryForm").validate({
                    rules: {
                        categoryName: "required",
                    },
                    messages: {
                    },
               submitHandler: function(form) {
            
                var actionType = $('#saveBtn').val();
                $('#saveBtn').html('Sending..');
                 
                $.ajax({
                    data: $('#categoryForm').serialize(),
                    url: SITEURL + "/category/store",
                    type: "POST",
                    dataType: 'json',
                    success: function (data) {
            
                        $('#categoryForm').trigger("reset");
                        $('#categoryModal').modal('hide');
                        $('#saveBtn').html('Save Changes');
                        var oTable = $('#category_datatable').dataTable();
                        oTable.fnDraw(false);
                         
                    },
                    error: function (data) {
                        console.log('Error:', data);
                        $('#saveBtn').html('Save Changes');
                    }
                });
              }
            });
          }
        }); 
</script>

@endpush
@endsection
