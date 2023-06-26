@extends('admin.master')
@section('title')
    {{$title}} Details
@endsection
@section('body')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">
                                    @if($slug=='vendor')
                                        All Vendor Information
                                    @elseif($slug=='subadmin')
                                        All Sub-Admin Information
                                    @elseif($slug=='admin')
                                        All Admin Information
                                    @elseif($slug=='all')
                                        All Admin/Vendor/Sub-Admin Information
                                    @endif
                            </h4>
                            <div class="table-responsive pt-3">
                                <table id="example"
                                       class="table table-striped table-bordered">
                                    <thead>
                                    <tr>
                                        <th>Serial No</th>
                                        <th>Admin Id</th>
                                        <th>Name</th>
                                        <th>Type</th>
                                        <th>Mobile</th>
                                        <th>Email</th>
                                        <th>Image</th>
                                        <th>Status</th>
                                        <th>Acton</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($admins as $key => $admin)
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>{{$admin->id}}</td>
                                            <td>{{$admin->name}}</td>
                                            <td>{{$admin->type}}</td>
                                            <td>{{$admin->mobile}}</td>
                                            <td>{{$admin->email}}</td>
                                            <td><img src="{{asset($admin->image)}}"
                                                     style="width: 70px;height: 70px;"></td>
                                            <td>
                                                @if($admin->status == 1)
                                                    <span
                                                        class="badge badge-success">Active</span>
                                                @else
                                                    <span
                                                        class="badge badge-warning">Deactive</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if($admin->type=='vendor')
                                                    <a title="View Details?"
                                                       href="{{route('admin.view.vendor.details',$admin->vendor_id)}}"
                                                       class="viewbtn mdi mdi-book-open-page-variant"></a>
                                                    {{--   @elseif($admin->type=='admin')--}}
                                                    {{--  <a href="{{route('superadmin.view.admin.details',$admin->admin_id)}}"--}}
                                                    {{--  class="viewbtn mdi mdi-book-open-page-variant"></a>--}}
                                                    {{--@elseif($admin->type=='subadmin')--}}
                                                    {{--<a href="{{route('superadmin.view.subadmin.details',$admin->subadmin_id)}}"--}}
                                                    {{--class="viewbtn mdi mdi-book-open-page-variant"></a> --}}
                                                @endif
                                                @if($admin->type=='vendor' || $admin->type=='admin' || $admin->type=='subadmin' )
                                                    @if($admin->status == 1)
                                                        <a title="Unapprove?" attr="{{ucfirst($admin->type)}} Status"
                                                           class="success-msg"
                                                           href="{{route('admin.update.status',$admin->id)}}"><i
                                                                class="deactivebtn  mdi mdi-thumb-down-outline"></i></a>
                                                    @else
                                                        <a title="Approve?" attr="{{ucfirst($admin->type)}} Status"
                                                           class="success-msg"
                                                           href="{{route('admin.update.status',$admin->id)}}"><i
                                                                class="activebtn   mdi mdi-thumb-up-outline"></i></a>
                                                    @endif
                                                    @if($admin->type=='vendor')
                                                        <a href="javascript:void(0)"
                                                           module="Vendor"
                                                           moduleId="{{$admin->id}}"
                                                           title="Delete?"
                                                           class="confirmDelete deletebtn mdi mdi-delete"></a>
                                                    @elseif($admin->type=='admin')
                                                        <a href="javascript:void(0)"
                                                           module="Admin"
                                                           moduleId="{{$admin->id}}"
                                                           title="Delete?"
                                                           class="confirmDelete deletebtn mdi mdi-delete"></a>
                                                    @elseif($admin->type=='subadmin')
                                                        <a href="javascript:void(0)"
                                                           module="Subadmin"
                                                           moduleId="{{$admin->id}}"
                                                           title="Delete?"
                                                           class="confirmDelete deletebtn mdi mdi-delete"></a>
                                                    @endif
                                                @endif
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
