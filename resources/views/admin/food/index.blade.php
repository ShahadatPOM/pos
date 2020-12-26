@extends('layouts.admin.master')
@section('master.content')
<div class="container">
    <h2>Food Categories</h2>
    <hr>
    <a href="javascript:void(0)" class="btn btn-info ml-3" id="createNewCategory">Add New</a>
    <br><br>

    <table class="table table-bordered table-striped" id="category_datatable">
        
    </table>
</div>

{{--  Category Modal Began  --}}
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
                            <input type="text" class="form-control" id="categoryName" name="categoryName" placeholder="Enter Tilte"
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
                        <button class="btn btn-danger"  data-dismiss="modal" aria-label="Close">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
{{--  Category Modal end  --}}


@push('base.js')
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
    <script>
            $('#category_datatable').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url:  "{{ route('category.show') }}",
                    method: 'POST',
                    data: {
                    _token: "{{ csrf_token() }}"

                    }
                },
                columns: [
                    {title: 'Category Name', data: 'categoryName', name: 'categoryName'},
                    {title: 'Status', data: 'status', name: 'status'},
                   
                    { title:'Action', className: "text-center", data : function(data){
                        return '<a class="btn btn-info btn-sm" onclick="editCategory(this)" data-panel-id="'+data.id+'"><i class="fa fa-edit"></i></a>'+
                                ' <button type="button" class="btn btn-danger btn-sm" onclick="deleteCategory(this)" data-panel-id="'+data.id+'">'+
                                    '<i class="fa fa-trash"></i> </button>';
                                },
                        orderable: false, searchable:false
                    }
                ],
            });

            /*  When user click add category button */
            $('#createNewCategory').click(function () {
                $('#categoryForm').trigger("reset");
                $('#saveBtn').html("create");
                $('#categoryModalTitle').html("Add New Category");
                $('#categoryModal').modal('show');
            });

            function deleteCategory(x) {
                categoryId = $(x).data('panel-id');
                    if(!confirm("Delete This Category?")){
                        return false;
                    }
                    $.ajax({
                        type: 'POST',
                        url: "{!! route('category.destroy') !!}",
                        cache: false,
                        data: {_token: "{{csrf_token()}}",'categoryId': categoryId},
                        success: function (data) {
                            $('#category_datatable').DataTable().clear().draw();
                        }
                    });
                
               
            } 

            function editCategory(x) {
                categoryId = $(x).data('panel-id');
                    $('#saveBtn').html("update");
                    $('#categoryModalTitle').html("Edit Category");
                    $('#categoryModal').modal('show');

                    $.ajax({
                        type: 'POST',
                        url: "{!! route('category.edit') !!}",
                        cache: false,
                        data: {_token: "{{csrf_token()}}",'categoryId': categoryId},
                        success: function (data) {
                            console.log(data);
                            $('#categoryName').val(data.categoryName);
                            $('#category_datatable').DataTable().clear().draw();
                        }
                    });
            }

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
                url: "{{ route('category.store') }}",
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
    
    </script>

@endpush
@endsection
