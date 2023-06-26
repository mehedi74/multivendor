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
                            <h4 class="card-title">Update Admin Password</h4>
                            <form action="{{route('admin.update.password')}}" class="forms-sample" method="post"
                                  id="updatePassword">
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
                                    <label for="current">Current Password</label>
                                    <input type="password" name="current_password" class="form-control"
                                           id="current_password" placeholder="Enter your current Password" required>
                                    <span id="recent_password"></span>
                                </div>
                                <p id="checkedPassword"></p>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">New Password</label>
                                    <input type="password" name="new_password" class="form-control" id="new_password"
                                           placeholder="Enter new Password" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputConfirmPassword1">Confirm Password</label>
                                    <input type="password" name="confirm_password" class="form-control"
                                           id="confirm_password" placeholder="Confirm Password" required>
                                </div>
                                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
