@extends('admin.master')
@section('title')
    Add Product
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
                            <form action="{{route('product.create')}}" enctype="multipart/form-data" method="post">
                                @csrf
                                <h4 class="card-title" style="display: inline-block">Add Product</h4>
                                    <div class="form-group">
                                        <label for="category_id">Select Category<sup class="red">*</sup></label>
                                        <div class="select">
                                            <select name="subCategory_id" required id="subCatId">
                                                <option value="">Select Category</option>
                                                @foreach($sectionsWithCatSubCat as $section)
                                                    <optgroup label="{{$section['name']}}"></optgroup>
                                                    @foreach($section['categories'] as $category)
                                                        <option   disabled style="color: red" >
                                                            &nbsp;&nbsp;--&nbsp;{{$category['name']}}</option>
                                                        @foreach($category['sub_categories'] as $subCategory)
                                                            <option value="{{$subCategory['id']}}">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;--&nbsp;{{$subCategory['name']}}</option>
                                                        @endforeach
                                                    @endforeach
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="brand_id">Select Brand<sup class="red">*</sup></label>
                                        <div class="select">
                                            <select name="brand_id" required id="brand_id">
                                                <option value="">Select Brand</option>
                                                @foreach($brands as $brand)
                                                    <option value="{{$brand->id}}">{{$brand->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Name<sup class="red">*</sup></label>
                                        <input type="text" name="product_name" class="form-control" required
                                               id="product_name" placeholder="Enter product name"/>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Code<sup class="red">*</sup></label>
                                        <input type="text" name="product_code" class="form-control" required
                                               id="product_code" placeholder="Enter product code"/>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Color<sup class="red">*</sup></label>
                                        <input type="text" name="product_color" class="form-control" id="product_color" required
                                               placeholder="Enter product color"/>
                                    </div>
                                    <div class="form-group">
                                        <label for="product_price">Price<sup class="red">*</sup></label>
                                        <input type="text" name="product_price" class="form-control" id="product_price" required
                                               placeholder="Enter product price"/>
                                    </div>

                                    <div class="form-group">
                                        <label for="product_discount">Discount (%)</label>
                                        <input type="text" name="product_discount" class="form-control"
                                               id="product_discount" placeholder="Enter discount "/>
                                    </div>
                                    <div class="form-group">
                                        <label for="product_short_description">Short Description</label>
                                        <textarea class="form-control" name="product_short_description"
                                                  id="product_short_description"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="product_long_description">Long Description</label>
                                        <textarea class="form-control" name="product_long_description"
                                                  id="product_long_description"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="product_image">Featured Image<sup class="red">*</sup></label><br>
                                        <input type="file" name="product_image" id="input-file-now">
                                    </div>
                                    <div class="form-group">
                                        <label for="product_image">Product Video<sup class="red">*</sup></label><br>
                                        <input type="file" name="product_video" id="input-file-now">
                                    </div>
                                    <div class="form-group">
                                        <label for="is_featured">Featured Product? <sup class="red">*</sup></label><br>
                                        <label><input type="radio" value="Yes" name="is_featured" id="is_featured" checked> Yes</label>
                                        <label style="margin-left:10px"><input type="radio" value="No" name="is_featured" id="is_featured">NO</label>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Url<span style="color:gray"> (optional)</span></label>
                                        <input type="text" name="product_url" class="form-control"
                                               id="product_url" placeholder="Enter url "/>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Meta Title<span style="color:gray"> (optional)</span></label>
                                        <input type="text" name="product_meta_title" class="form-control"
                                               id="product_meta_title" placeholder="Enter meta title "/>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Meta Description<span style="color:gray"> (optional)</span></label>
                                        <input type="text" name="product_meta_description" class="form-control"
                                               id="product_meta_description" placeholder="Enter meta description "/>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Meta Keywords<span style="color:gray"> (optional)</span></label>
                                        <input type="text" name="product_meta_keywords" class="form-control"
                                               id="product_meta_keywords" placeholder="Enter meta keywords "/>
                                    </div>
                                    <div class="form-group">
                                        <label for="status">Publication Status</label>
                                        <div>
                                            <label><input type="radio" name="product_status" value="1" id="" checked> Publish</label>
                                            <label style="margin-left: 10px;"><input type="radio" name="product_status" value="0" id=""> Unpublish</label>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary mr-2">Add Product</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
