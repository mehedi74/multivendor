@extends('admin.master')
@section('title')
    All Sub Categories
@endsection
@section('body')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            {{session('msg')}}
                            <h4  style="display: inline-block" class="card-title">All Sub Category Information</h4>
                            <a  href="{{route('sub-category.create')}}" style="float: right" class="btn btn-primary">Add SubCategory</a>
                            <div class="table-responsive pt-3">
                                <table id="example" class="table table-striped table-bordered">
                                    <thead>
                                    <tr>
                                        <th>Serial No</th>
                                        <th>Name</th>
                                        <th>Section</th>
                                        <th>Category</th>
                                        <th>Discount</th>
                                        <th>Image</th>
                                        <th>Status</th>
                                        <th>Acton</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($subCategories as $key => $subCategory)
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>{{$subCategory->name}}</td>
                                            <td>{{$subCategory->section->name}}</td>
                                            <td>{{$subCategory->category->name}}</td>
                                            <td>{{$subCategory->discount}}</td>
                                            <td><img src="{{asset($subCategory->image)}}"
                                                     style="width: 70px;height: 70px;"></td>
                                            <td>
                                                @if($subCategory->status == 1)
                                                    <span class="badge badge-success">Active</span>
                                                @else
                                                    <span
                                                        class="badge badge-warning">Deactive</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if($subCategory->status == 1)
                                                    <a class="success-msg" title="Deactive?" attr="SubCategory Status" href="{{route('sub-category.update.status',$subCategory->id)}}"><i class="deactivebtn mdi mdi-thumb-down-outline"></i></a>
                                                @else
                                                    <a class="success-msg" title="Active?" attr="SubCategory Status" href="{{route('sub-category.update.status',$subCategory->id)}}"><i class="activebtn  mdi mdi-thumb-up-outline"></i></a>
                                                @endif
                                                <a title="edit?" href="{{route('sub-category.edit',$subCategory->id)}}"><i class="editbtn  mdi mdi-pencil-box-outline"></i></a>
                                                <a  title="delete?"  class="confirmDelete" href="javascript:void(0)"  module="SubCategory" moduleId="{{$subCategory->id}}"><i class="deletebtn  mdi mdi-delete"></i></a>
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
