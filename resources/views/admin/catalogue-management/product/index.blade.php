@extends('admin.master')
@section('title')
    {{$title}}
@endsection
@section('body')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            {{session('msg')}}
                            <h4 style="display: inline-block" class="card-title">All Products Information</h4>
                            <a href="{{route('product.create')}}" style="float: right" class="btn btn-primary">Add
                                Product</a>
                            <div class="table-responsive pt-3">
                                <table id="example" class="table table-striped table-bordered">
                                    <thead>
                                    <tr>
                                        <th>Serial No</th>
                                        <th>Name</th>
                                        <th>Section</th>
                                        <th>Brand</th>
                                        <th>Discount</th>
                                        <th>code</th>
                                        <th>Added By</th>
                                        <th>Image</th>
                                        <th>Status</th>
                                        <th>Acton</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($products as $key => $product)
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>{{$product->name}}</td>
                                            <td>{{$product->section->name}}</td>
                                            <td>{{$product->brand->name}}</td>
                                            <td>{{$product->discount}}</td>
                                            <td>{{$product->code}}</td>
                                            <td>
                                                @if($product->admin_type=='vendor')
                                                    <a href="{{route('admin.view.vendor.details',$product->vendor_id)}}">{{$product->admin_type}}</a>
                                                @elseif($product->admin_type=='admin')
                                                    <a href="#">{{$product->admin_type}}</a>
                                                @elseif($product->admin_type=='subadmin')
                                                    <a href="#">{{$product->admin_type}}</a>
                                                @elseif($product->admin_type=='superadmin')
                                                    <p>{{$product->admin_type}}</p>
                                                @endif
                                            </td>
                                                <td><img src="{{asset($product->featured_image)}}"
                                                         style="width: 70px;height: 70px;"></td>
                                                <td>
                                                    @if($product->status == 1)
                                                        <span class="badge badge-success">Active</span>
                                                    @else
                                                        <span
                                                            class="badge badge-warning">Deactive</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if($product->status == 1)
                                                        <a class="success-msg" title="Deactive?" attr="Product Status"
                                                           href="{{route('product.update.status',$product->id)}}"><i
                                                                class="deactivebtn mdi mdi-thumb-down-outline"></i></a>
                                                    @else
                                                        <a class="success-msg" title="Active?" attr="Product Status"
                                                           href="{{route('product.update.status',$product->id)}}"><i
                                                                class="activebtn  mdi mdi-thumb-up-outline"></i></a>
                                                    @endif
                                                    <a title="View Details?" href="#"
                                                       class="viewbtn mdi mdi-book-open-page-variant"></a>
                                                    <a title="Add Attributes?" href="#"
                                                       class="viewbtn mdi mdi-border-inside"></a>
                                                    <a title="edit?" href="#"><i
                                                            class="editbtn  mdi mdi-pencil-box-outline"></i></a>
                                                    <a title="delete?" class="confirmDelete" href="javascript:void(0)"
                                                       module="Product" moduleId="{{$product->id}}"><i
                                                            class="deletebtn  mdi mdi-delete"></i></a>
                                                </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
