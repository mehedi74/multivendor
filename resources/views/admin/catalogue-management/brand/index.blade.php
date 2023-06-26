@extends('admin.master')
@section('title')
    All Brands
@endsection
@section('body')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            {{session('msg')}}
                            <h4  style="display: inline-block" class="card-title">All Brands Information</h4>
                            <a  href="{{route('brand.create')}}" style="float: right" class="btn btn-primary">Add Brand</a>
                            <div class="table-responsive pt-3">
                                <table id="example" class="table table-striped table-bordered">
                                    <thead>
                                    <tr>
                                        <th>Serial No</th>
                                        <th>Name</th>
                                        <th>Section</th>
                                        <th>Discount</th>
                                        <th>Status</th>
                                        <th>Acton</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($brands as $key => $brand)
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>{{$brand->name}}</td>
                                            <td>{{$brand->section_id == 0 ? 'All' : $brand->section->name}}</td>
                                            <td>{{$brand->discount}}</td>
                                            <td>
                                                @if($brand->status == 1)
                                                    <span class="badge badge-success">Active</span>
                                                @else
                                                    <span
                                                        class="badge badge-warning">Deactive</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if($brand->status == 1)
                                                    <a class="success-msg" title="Deactive?" attr="Brand Status" href="{{route('brand.status.update',$brand->id)}}"><i class="deactivebtn mdi mdi-thumb-down-outline"></i></a>
                                                @else
                                                    <a class="success-msg" title="Deactive?" attr="Brand Status" href="{{route('brand.status.update',$brand->id)}}"><i class="activebtn  mdi mdi-thumb-up-outline"></i></a>
                                                @endif
                                                <a title="edit?" href="{{route('brand.edit',$brand->id)}}"><i class="editbtn  mdi mdi-pencil-box-outline"></i></a>
                                                <a  title="delete?"  class="confirmDelete" href="javascript:void(0)"  module="Brand" moduleId="{{$brand->id}}"><i class="deletebtn  mdi mdi-delete"></i></a>
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
