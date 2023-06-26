@extends('admin.master')
@section('title')
    Dashboard
@endsection
@section('body')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-12 grid-margin">
                    <div class="row">
                        <div class="col-6 col-xl-8 mb-4 mb-xl-0">
                            <h3 class="font-weight-bold">Settings</h3>
                        </div>
                        <div class="col-12 col-xl-4">
                            <div class="justify-content-end d-flex">
                                <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
                                    <button class="btn btn-sm btn-light bg-white dropdown-toggle" type="button"
                                            id="dropdownMenuDate2" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="true">
                                        <i class="mdi mdi-calendar"></i> Today ({{date('D-M-Y')}})
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuDate2">
                                        <a class="dropdown-item" href="#">January - March</a>
                                        <a class="dropdown-item" href="#">March - June</a>
                                        <a class="dropdown-item" href="#">June - August</a>
                                        <a class="dropdown-item" href="#">August - November</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-10 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            @if(Session::has('msg'))
                                <div style="display: inline-block"
                                     class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>{{session('msg')}}!</strong>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                            @if ($errors->any())
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                            <h4 class="card-title">Update Admin Details</h4>
                            <form action="{{route('admin.update.details')}}" class="forms-sample" method="post"
                                  id="updatePassword" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label>Admin Username/Email</label>
                                    <input class="form-control" readonly value="{{$adminDetails->email}}">
                                </div>
                                <div class="form-group">
                                    <label>Admin Type</label>
                                    <input class="form-control" readonly value="{{$adminDetails->type}}">
                                </div>
                                <div class="form-group">
                                    <label for="name">Admin Name</label>
                                    <input type="text" name="admin_name" class="form-control"
                                           id="admin_name" placeholder="Enter your name" value="{{$adminDetails->name}}" required>
                                </div>
                                <p id="checkedPassword"></p>
                                <div class="form-group">
                                    <label for="admin_mobile">Admin Mobile Number</label>
                                    <input type="text" name="admin_mobile" class="form-control" id="admin_mobile"
                                           placeholder="Enter mobile number" value="{{$adminDetails->mobile}}" required>
                                </div>
                                <div class="form-group">
                                    <label for="admin_mobile">Admin Image</label>
                                    <a href="{{asset($adminDetails->image)}}" target="_blank" title="View Recent Image"><img src="{{asset($adminDetails->image)}}" style="width: 70px;height: 50px;"></a>
                                    <input type="file" name="admin_image" class="form-control" id="admin_image" accept="image/*">
                                </div>
                                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
