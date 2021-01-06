@extends('layouts.admin.master')
@section('master.content')
<div class="container">
    <h2>Food Categories</h2>
    <hr>
    <a href="{{ route('category.create') }}" class="btn btn-info ml-3">Add New</a>
    <br><br>

    <table class="table table-bordered table-striped" id="category_table">
        <thead>
            <tr>
                <th class="text-center" width="5%">ID</th>
                <th class="text-center" width="15%">Image</th>
                <th class="text-center" width="15%">Category</th>
                <th class="text-center" width="15%">Status</th>
                <th class="text-center" width="10%">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
            <tr>
                <td>{{ $category->id }}</td>
                <td>
                    <img class=" img-fluid" style="width: 50px" src="{{ asset('category/'. $category->cat_image) }}" alt="Category image">
                </td>
                <td>{{ $category->categoryName }}</td>
                <td>
                    @if($category->status == 1)
                    <span class="badge badge-warning">Active</span>
                    @else
                    <span class="badge badge-danger">Inactive</span>
                    @endif
                </td>
                <td class="text-center">
                    <a href="{{ route('category.edit', $category->id) }}" class="btn btn-sm btn-warning" title="edit"><i class="fa fa-edit"></i></a>
                    <form action="{{ route('category.delete', $category->id) }}" method="post"
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
            $('#category_table').DataTable();
    </script>

{{--  <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>  --}}
    {{--  <script>
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
                        return ' <button type="button" class="btn btn-warning btn-sm" onclick="editCategory(this)" data-panel-id="'+data.id+'">'+
                            '<i class="fa fa-edit"></i> </button>'+
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
                            $('#category_datatable').DataTable().draw();
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
                            $('#category_id').val(data.id);
                            {{--  $('#saveBtn').attr('action', 'category/update/'+data.id);  --}}
                            {{--  $('#category_datatable').DataTable().draw();  --}}
                        }
                    });
            }

        {{--  if ($("#categoryForm").length > 0) {
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
        }  --}}
    
    {{--  </script>  --}}  --}}

@endpush
@endsection
