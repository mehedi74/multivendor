@extends('admin.master')
@section('title')
    {{$title}}
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
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
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
                            <h4 class="card-title">Update Section</h4>
                            <form action="{{route('section.edit',$section->id)}}" class="forms-sample" method="post"
                                  id="update-section" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="name">Section Name<sup class="red">*</sup></label>
                                    <input type="text" name="section_name"  value="{{$section->name}}" required class="form-control"
                                           id="section_name" placeholder="Enter section name">
                                </div>
                                <div class="form-group">
                                    <label for="image">Section Image</label><img src="{{asset($section->image)}}" style="width: 80px;height:70px; margin-bottom: 2px"><br>
                                    <input type="file" name="section_image"  id="input-file-now" class="dropify"/>
                                </div>
                                <div class="form-group">
                                    <label for="status">Publication Status</label>
                                    <div>
                                        <label><input type="radio" name="section_status" value="1" id="" {{$section->status ==1 ? 'checked': ''}}> Publish</label>
                                        <label style="margin-left: 10px;"><input type="radio" name="section_status" value="0" {{$section->status ==0 ? 'checked': ''}} id=""> Unpublish</label>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary mr-2">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
