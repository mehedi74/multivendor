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
                            <h4 class="card-title">Update Brand</h4>
                            <form action="{{route('brand.edit',['id'=>$brand->id])}}" class="forms-sample" method="post"
                                  id="add-brand" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="name">Name<sup class="red">*</sup></label>
                                    <input type="text" name="brand_name" class="form-control" required value="{{$brand->name}}"
                                           id="brand_name" placeholder="Enter brand name" />
                                </div>
                                <div class="form-group">
                                    <label for="name">Select Section (Please choose All if brand covers many sections)<sup class="red">*</sup></label>
                                    <div class="select">
                                        <select name="section_id" required >
                                            <option>Select Section</option>
                                            <option value="0" {{$brand->section_id == 0 ? 'selected' : ''}}>All</option>
                                            @foreach($sections as $section)
                                                <option {{!$brand->section_id == 0 && $brand->section->name == $section->name ? 'selected' : ''}} value="{{$section->id}}">{{$section->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="name">Discount</label>
                                    <input type="number" name="brand_discount" class="form-control" value="{{$brand->discount}}"
                                           id="subcat_discount" placeholder="Enter discount "/>
                                </div>
                                <div class="form-group">
                                    <label for="status">Publication Status</label>
                                    <div>
                                        <label><input type="radio" name="brand_status" value="1" id="" {{$brand->status == 1 ? 'checked' : ''}}>
                                            Publish</label>
                                        <label style="margin-left: 10px;"><input type="radio" name="brand_status" value="0" id="" {{$brand->status == 0 ? 'checked' : ''}}> Unpublish</label>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary mr-2">Update Brand</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
