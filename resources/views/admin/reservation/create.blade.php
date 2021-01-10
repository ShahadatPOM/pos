@extends('layouts.admin.master')
@section('master.content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <div class="card mt-3">
                    <div class="card-header">
                        <h4>Add Reservation</h4>
                        <small><span style="color: red">*</span>Indicates Required Field</small>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                        <div class="col-12">
                            <form action="{{ route('reservation.store') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="name">Customer Name</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" name="name" placeholder="Customer Name">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="name">Number of Person</label>
                                    <div class="col-sm-12">
                                        <input type="number" class="form-control" name="no_of_person" placeholder="Number of Person">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="name">Mobile</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" name="mobile" placeholder="Mobile">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="name">Email</label>
                                    <div class="col-sm-12">
                                        <input type="email" class="form-control" name="email" placeholder="Email">
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label for="name">Start Time</label>
                                    <div class="col-sm-12">
                                        <input type="time" class="form-control" name="start_time" placeholder="Start Time">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="name">End Time</label>
                                    <div class="col-sm-12">
                                        <input type="time" class="form-control" name="end_time" placeholder="End Time">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="name">Date</label>
                                    <div class="col-sm-12">
                                        <input type="date" class="form-control" name="date" placeholder="Date">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="name">Table No</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" name="table_no" placeholder="Table No">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Status</label>
                                    <div class="col-sm-12">
                                        <select class="form-control" name="status">
                                            <option value="1">Active</option>
                                            <option value="0">Inactive</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-primary">Create</button>
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

