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
                            <h4 class="card-title">Add Category</h4>
                            <form action="{{route('category.create')}}" class="forms-sample" method="post"
                                  id="add-section" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="name">Select Section<sup class="red">*</sup></label>
                                    <div class="select">
                                        <select name="section_id" required>
                                            <option value="">Select Section</option>
                                            @foreach($sections as $section)
                                                <option value="{{$section->id}}">{{$section->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="name">Name<sup class="red">*</sup></label>
                                    <input type="text" name="cat_name" class="form-control" required
                                           id="cat_name" placeholder="Enter category name" />
                                </div>
                                <div class="form-group">
                                    <label for="name">Discount</label>
                                    <input type="text" name="cat_discount" class="form-control"
                                           id="cat_discount" placeholder="Enter discount "/>
                                </div>
                                <div class="form-group">
                                    <label for="name">Description</label>
                                    <textarea class="form-control" name="cat_description" id="cat_description"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="image">Category Image<sup class="red">*</sup></label><br>
                                    <input type="file"  required name="cat_image" id="input-file-now" class="dropify"/>
                                </div>
                                <div class="form-group">
                                    <label for="name">Url</label>
                                    <input type="text" name="cat_url" class="form-control"
                                           id="cat_url" placeholder="Enter url "/>
                                </div>
                                <div class="form-group">
                                    <label for="name">Meta Title</label>
                                    <input type="text" name="cat_meta_title" class="form-control"
                                           id="cat_meta_title" placeholder="Enter meta title "/>
                                </div>
                                <div class="form-group">
                                    <label for="name">Meta Description</label>
                                    <input type="text" name="cat_meta_description" class="form-control"
                                           id="cat_url" placeholder="Enter meta description "/>
                                </div>
                                <div class="form-group">
                                    <label for="name">Meta Keywords</label>
                                    <input type="text" name="cat_meta_keywords" class="form-control"
                                           id="cat_meta_keywords" placeholder="Enter meta keywords "/>
                                </div>
                                <div class="form-group">
                                    <label for="status">Publication Status</label>
                                    <div>
                                        <label><input type="radio" name="cat_status" value="1" id="" checked>
                                            Publish</label>
                                        <label style="margin-left: 10px;"><input type="radio" name="cat_status" value="0" id=""> Unpublish</label>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary mr-2">Add Category</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
