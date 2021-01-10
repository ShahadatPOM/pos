@extends('layouts.admin.master')
@section('master.content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <div class="card mt-3">
                    <div class="card-header">
                        <h4>Edit Order</h4>
                        <small><span style="color: red">*</span>Indicates Required Field</small>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                        <div class="col-12">
                            <form action="{{ route('order.update', $order->id) }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="name">Order Total</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" value="{{ $order->orderTotal }}" name="orderTotal">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Status</label>
                                    <div class="col-sm-12">
                                        <select class="form-control" name="status">
                                            <option value="pending" @if($order->status == "pending") selected @endif>Pending</option>
                                            <option value="complete" @if($order->status == "complete") selected @endif>Complete</option>
                                            <option value="cancel" @if($order->status == "cancel") selected @endif>Cancel</option>
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

