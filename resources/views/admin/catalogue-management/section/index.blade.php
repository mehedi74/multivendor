@extends('admin.master')
@section('title')
    All Sections
@endsection
@section('body')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            {{session('msg')}}
                            <h4  style="display: inline-block" class="card-title">All Sections Information</h4>
                            <a  href="{{route('section.create')}}" style="float: right" class="btn btn-primary">Add Section</a>
                            <div class="table-responsive pt-3">
                                <table id="example" class="table table-striped table-bordered">
                                    <thead>
                                    <tr>
                                        <th>Serial No</th>
                                        <th>Name</th>
                                        <th>Image</th>
                                        <th>Status</th>
                                        <th>Acton</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($sections as $key => $section)
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>{{$section->name}}</td>
                                            <td><img src="{{asset($section->image)}}"
                                                     style="width: 70px;height: 70px;"></td>
                                            <td>
                                                @if($section->status == 1)
                                                    <span class="badge badge-success">Active</span>
                                                @else
                                                    <span
                                                        class="badge badge-warning">Deactive</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if($section->status == 1)
                                                    <a class="success-msg" attr="Section Status" href="{{route('section.update.status',$section->id)}}"><i class="deactivebtn mdi mdi-thumb-down-outline"></i></a>
                                                @else
                                                    <a class="success-msg" attr="Section Status" href="{{route('section.update.status',$section->id)}}"><i class="activebtn  mdi mdi-thumb-up-outline"></i></a>
                                                @endif
                                                <a title="edit?" href="{{route('section.edit',$section->id)}}"><i class="editbtn mdi mdi-pencil-box-outline"></i></a>
                                                <a  title="delete?" href="javascript:void(0)" class="confirmDelete" module="Section" moduleId="{{$section->id}}"><i class="deletebtn  mdi mdi-delete"></i></a>

                                                <!-- sweet alert by resource controller will be learn soon....
{{--                                                    <form  style="display: inline-block;" action="{{route('sections.destroy',$section->id)}}" method="post">--}}
{{--                                                     @csrf--}}
{{--                                                     @method('DELETE')--}}
                                                    <button  style="display: inline-block;" type="submit"  class="btn-edit show-alert-delete-box"><i class="deletebtn mdi mdi-delete"></i></button>
                                                    </form>
                                              -->
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
