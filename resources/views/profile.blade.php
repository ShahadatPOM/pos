@extends('layouts.admin.master')
@section('master.content')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Profile</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">User Profile</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>


<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">

                <!-- Profile Image -->
                <div class="card card-danger card-outline">
                    <div class="card-body box-profile">
                        <div class="text-center">
                            <img class="profile-user-img img-fluid img-circle" src="{{ asset('profile/'. $user->image) }}" alt="User profile picture">
                        </div>

                        <h3 class="profile-username text-center">{{ $user->name }}</h3>
                        <p style="font-size: 14px;">{{ $user->about }}</p>


                        <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                                <b>Designation</b> <a class="float-right">{{ $user->designation }}</a>
                            </li>
                            <li class="list-group-item">
                                <b>status</b> <small class="float-right">@if($user->status == 0) <span class="badge badge-warning">Inactive</span> @else <span class="badge badge-success">Active</span> @endif</small>
                            </li>
                        </ul>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->

            </div>

            <div class="col-md-9">
                <div class="card card-danger card-outline">
                    <div class="card-header p-2">
                        <ul class="nav nav-pills">
                            <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Profile
                                    Details</a></li>
                            <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Update Profile</a>
                            </li>
                            <li class="nav-item"><a class="nav-link" href="#general" data-toggle="tab">General</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="active tab-pane" id="activity">
                                <!-- Post -->
                                <div class="post">
                                    <div class="user-block">
                                        <img class="img-circle img-bordered-sm"
                                            src="{{ asset('profile/'. $user->image) }}" alt="">
                                        <span class="username">
                                            <h4 style="font-weight: bold; letter-spacing: 2px; font-size: 16px; color: blue">ABOUT</h4>
                                            <a href="#" class="float-right btn-tool"></a>
                                        </span>
                                        <span class="description">Member Since - {{ $user->created_at->format('Y-m-d H:i a') }} </span>
                                    </div>
                                    <!-- /.user-block -->
                                    <table class="table table-borderless">
                                        <tr>
                                            <th>First Name:</th>
                                            <td>{{ $user->firstName }}</td>
                                            <th>Last Name:</th>
                                            <td>{{ $user->lastName }}</td>
                                        </tr>
                                        <tr>
                                            <th>User Name:</th>
                                            <td>{{ $user->name }}</td>
                                            <th>Email:</th>
                                            <td>{{ $user->email }}</td>
                                        </tr>
                                        <tr>
                                            <th>City:</th>
                                            <td>{{ $user->city }}</td>
                                            <th>Country:</th>
                                            <td>{{ $user->country }}</td>
                                        </tr>
                                        <tr>
                                            <th>Mobile:</th>
                                            <td>{{ $user->mobile }}</td>
                                            <th>Address:</th>
                                            <td>{{ $user->address }}</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>

                            <div class="tab-pane" id="settings">
                                <form class="form-horizontal" action="{{ route('profile.store', $user->id) }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group row">
                                            <label for="inputEmail" class="col-sm-2 col-form-label">First Name</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="firstName" value="{{ $user->firstName }}" id="inputEmail" placeholder="First Name">
                                                 @error('firstName')
                                                <div class="alert alert-danger mt-2 mb-2">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group row">
                                            <label for="inputEmail" class="col-sm-2 col-form-label">Last Name</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="lastName" value="{{ $user->lastName }}" id="inputEmail" placeholder="Last Name">
                                                 @error('lastName')
                                                <div class="alert alert-danger mt-2 mb-2">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group row">
                                            <label for="inputEmail" class="col-sm-2 col-form-label">User Name</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="name" value="{{ $user->name }}" id="inputEmail" placeholder="User Name">
                                                @error('name')
                                                <div class="alert alert-danger mt-2 mb-2">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group row">
                                            <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                            <div class="col-sm-10">
                                                <input type="email" class="form-control" name="email" value="{{ $user->email }}" id="inputEmail" placeholder="Email">
                                                @error('email')
                                                <div class="alert alert-danger mt-2 mb-2">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group row">
                                            <label for="inputEmail" class="col-sm-2 col-form-label">Country</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="country" value="{{ $user->country }}" id="inputEmail" placeholder="Country">
                                                @error('country')
                                                <div class="alert alert-danger mt-2 mb-2">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group row">
                                            <label for="inputEmail" class="col-sm-2 col-form-label">City</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="city" value="{{ $user->city }}" id="inputEmail" placeholder="City">
                                                @error('city')
                                                <div class="alert alert-danger mt-2 mb-2">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group row">
                                            <label for="inputEmail" class="col-sm-2 col-form-label">Mobile</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="mobile" value="{{ $user->mobile }}" id="inputEmail" placeholder="Mobile">
                                                @error('mobile')
                                                <div class="alert alert-danger mt-2 mb-2">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group row">
                                            <label for="inputEmail" class="col-sm-2 col-form-label">Address</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="address" value="{{ $user->address }}" id="inputEmail" placeholder="Address">
                                                @error('address')
                                                <div class="alert alert-danger mt-2 mb-2">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group row">
                                            <label for="inputEmail" class="col-sm-2 col-form-label">Designation</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="designation" value="{{ $user->designation }}" id="inputEmail" placeholder="Designation">
                                                @error('designation')
                                                <div class="alert alert-danger mt-2 mb-2">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group row">
                                            <label for="inputEmail" class="col-sm-2 col-form-label">About</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="about" value="{{ $user->about }}" id="inputEmail" placeholder="about">
                                                @error('about')
                                                <div class="alert alert-danger mt-2 mb-2">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-1 col-form-label">Photo</label>
                                        <div class="custom-file col-sm-11">
                                            <input type="file" class="custom-file-input" name="image">
                                       
                                            <label class="custom-file-label" for="image">Choose...</label>
                                        </div>
                                        @error('image')
                                        <div class="alert alert-danger mt-2 mb-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group row">
                                        <div class=" col-sm-10">
                                            <button type="submit" class="btn btn-danger">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            {{--  General  --}}
                            <div class="tab-pane" id="general">
                                <form class="form-horizontal" action="{{ route('general.store') }}" method="post">
                                    @csrf
                                        <div class="form-group row">
                                            <label for="inputEmail" class="col-sm-2 col-form-label">Old Password <sup style="color: red">*</sup></label>
                                            <div class="col-sm-10">
                                                <input type="password" class="form-control" name="oldpassword" id="inputEmail" placeholder="******">
                                                <input type="hidden" class="form-control" name="email" value="{{ $user->email }}">
                                                    @error('oldpassword')
                                                <div class="alert alert-danger mt-2 mb-2">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        
                                        <div class="form-group row">
                                            <label for="inputEmail" class="col-sm-2 col-form-label">New Password <sup style="color: red">*</sup></label>
                                            <div class="col-sm-10">
                                                <input type="password" class="form-control" name="newpassword" id="inputEmail" placeholder="******">
                                                    @error('newpassword')
                                                <div class="alert alert-danger mt-2 mb-2">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                
                                        <div class="form-group row">
                                            <div class=" col-sm-10">
                                                <button type="submit" class="btn btn-danger">Reset</button>
                                            </div>
                                        </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection