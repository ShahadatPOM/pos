@extends('layouts.admin.master')
@section('master.content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <div class="card mt-3">
                    <div class="card-header">
                        <h4>Edit Order Item</h4>
                        <small><span style="color: red">*</span>Indicates Required Field</small>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                        <div class="col-12">
                            <form action="{{ route('order.item.update', $orderItem->id) }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="name">Item Price</label>
                                    <div class="col-sm-12">
                                        <input type="number" class="form-control" value="{{ $orderItem->itemPrice }}" name="itemPrice">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="name">Quantity</label>
                                    <div class="col-sm-12">
                                        <input type="number" class="form-control" value="{{ $orderItem->quantity }}" name="quantity">
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

