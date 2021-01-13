@extends('layouts.admin.master')
@section('master.content')
<div class="container pt-5">
    <form action="{{ route('report') }}" target="_blank" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <label>From Date</label>
                    <div class="col-sm-12">
                        <input type="date" class="form-control" name="fromDate">
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label>To Date</label>
                    <div class="col-sm-12">
                        <input type="date" class="form-control" name="toDate">
                    </div>
                </div>  
            </div>
            <div class="col-md-3">
                <label>Generate Sale Report</label>
                    <button class="btn btn-info"  type="submit"><i class="fa fa-print"></i>  Print</button>
            </div>
        </div>
    </form>
</div>


@endsection
