@extends('admin.master')
@section('title')
    Vendor Personal Information
@endsection
@section('body')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-12 grid-margin">
                    <div class="row">
                        <div class="col-6 col-xl-8 mb-4 mb-xl-0">
                            <h3 class="font-weight-bold">Vendor Personal/Shop/Bank Information Details</h3>
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
                <div class="col-md-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Vendor Personal Information</h4>
                            <form action="#" class="forms-sample" method="post" id="#">
                                @csrf
                                <div class="form-group">
                                    <label>Username/Email</label>
                                    <input class="form-control" readonly
                                           value="{{$vendorDetail->vendorPersonalDetail->email}}">
                                </div>
                                <div class="form-group">
                                    <label>Name</label>
                                    <input class="form-control" readonly
                                           value="{{$vendorDetail['vendorPersonalDetail']['name']}}">
                                </div>
                                <div class="form-group">
                                    <label>Addressl</label>
                                    <input class="form-control" readonly
                                           value="{{$vendorDetail['vendorPersonalDetail']['address']}}">
                                </div>
                                <div class="form-group">
                                    <label>City</label>
                                    <input class="form-control" readonly
                                           value="{{$vendorDetail['vendorPersonalDetail']['city']}}">
                                </div>
                                <div class="form-group">
                                    <label>State</label>
                                    <input class="form-control" readonly
                                           value="{{$vendorDetail['vendorPersonalDetail']['state']}}">
                                </div>
                                <div class="form-group">
                                    <label>Country</label>
                                    <input class="form-control" readonly
                                           value="{{$vendorDetail['vendorPersonalDetail']['country']}}">
                                </div>
                                <div class="form-group">
                                    <label>Pincode</label>
                                    <input class="form-control" readonly
                                           value="{{$vendorDetail['vendorPersonalDetail']['pincode']}}">
                                </div>
                                <div class="form-group">
                                    <label>Mobile</label>
                                    <input class="form-control" readonly
                                           value="{{$vendorDetail['vendorPersonalDetail']['mobile']}}">
                                </div>
                                <div class="form-group">
                                    <label>Image</label>
                                    <img src="{{asset($vendorDetail['vendorPersonalDetail']['image'])}}">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Vendor Bank Information</h4>
                            <form action="#" class="forms-sample" method="post" id="#">
                                @csrf
                                <div class="form-group">
                                    <label>Bank Name</label>
                                    <input class="form-control" readonly
                                           value="{{$vendorDetail->vendorBankDetail->bank_name}}">
                                </div>
                                <div class="form-group">
                                    <label>Account Holder Name</label>
                                    <input class="form-control" readonly
                                           value="{{$vendorDetail['vendorBankDetail']['account_holder_name']}}">
                                </div>
                                <div class="form-group">
                                    <label>Account Number</label>
                                    <input class="form-control" readonly
                                           value="{{$vendorDetail['vendorBankDetail']['account_number']}}">
                                </div>
                                <div class="form-group">
                                    <label>IFSC Code</label>
                                    <input class="form-control" readonly
                                           value="{{$vendorDetail['vendorBankDetail']['bank_ifsc_code']}}">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Vendor Shop Information</h4>
                            <form action="#" class="forms-sample" method="post" id="#">
                                @csrf
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label>Name</label>
                                        <input class="form-control" readonly
                                               value="{{$vendorDetail['vendorShopDetail']['shop_name']}}">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Country</label>
                                        <input class="form-control" readonly
                                               value="{{$vendorDetail['vendorShopDetail']['shop_country']}}">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label>City</label>
                                        <input class="form-control" readonly
                                               value="{{$vendorDetail['vendorShopDetail']['shop_city']}}">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>State</label>
                                        <input class="form-control" readonly
                                               value="{{$vendorDetail['vendorShopDetail']['shop_state']}}">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label>Mobile</label>
                                        <input class="form-control" readonly
                                               value="{{$vendorDetail['vendorShopDetail']['shop_mobile']}}">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Email</label>
                                        <input class="form-control" readonly
                                               value="{{$vendorDetail['vendorShopDetail']['shop_email']}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Address</label>
                                    <input class="form-control" readonly
                                           value="{{$vendorDetail['vendorShopDetail']['shop_address']}}">
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label>Website</label>
                                        <input class="form-control" readonly
                                               value="{{$vendorDetail['vendorShopDetail']['shop_website']}}">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Address Proof</label>
                                        <input class="form-control" readonly
                                               value="{{$vendorDetail['vendorShopDetail']['address_proof']}}">
                                    </div>
                                </div>
                               <div class="row">
                                   <div class="form-group col-md-6">
                                       <label>Address Proof Image</label>
                                       <div>
                                           <a href="{{asset($vendorDetail['vendorShopDetail']['address_proof_image'])}}"><img
                                                   src="{{asset($vendorDetail['vendorShopDetail']['address_proof_image'])}}"
                                                   style="height: 70px;width: 100px;">View Image</a>
                                       </div>
                                   </div>
                                   <div class="form-group col-md-6">
                                       <label>PAN Number</label>
                                       <input class="form-control" readonly
                                              value="{{$vendorDetail['vendorShopDetail']['pan_number']}}">
                                   </div>
                               </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label>License Number</label>
                                        <input class="form-control" readonly
                                               value="{{$vendorDetail['vendorShopDetail']['business_license_number']}}">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>GST Number</label>
                                        <input class="form-control" readonly
                                               value="{{$vendorDetail['vendorShopDetail']['gst_number']}}">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <a  href="{{ url()->previous() }}" class="btn btn-primary">Go Back</a>
                </div>
            </div>
        </div>
@endsection

