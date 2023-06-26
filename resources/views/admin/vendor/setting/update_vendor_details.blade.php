@extends('admin.master')
@section('title')
    Update Vendor Details
@endsection
@section('body')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-12 grid-margin">
                    <div class="row">
                        <div class="col-6 col-xl-8 mb-4 mb-xl-0">
                            <h3 class="font-weight-bold">Vendor Details</h3>
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
            @if($slug=='personal')
                <div class="row">
                    <div class="col-md-10 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                @if(Session::has('msg'))
                                    <div style="display: inline-block"
                                         class="alert alert-success alert-dismissible fade show" role="alert">
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

                                <h4 class="card-title">Update Vendor Personal Profile</h4>
                                <form action="{{route('admin.update.vendor.details',['slug'=>$slug])}}"
                                      class="forms-sample" method="post"
                                      id="updatePassword" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label>Admin Username/Email</label>
                                        <input class="form-control" readonly value="{{$vendorPersonalDetail->email}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Vendor Name</label>
                                        <input type="text" name="vendor_name" class="form-control"
                                               id="vendor_name" placeholder="Enter your name"
                                               value="{{$vendorPersonalDetail->name}}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for=mobile">Vendor Address</label>
                                        <input type="text" name="vendor_address" class="form-control"
                                               id="vendor_address"
                                               placeholder="Enter your new address"
                                               value="{{$vendorPersonalDetail->address}}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Vendor Country</label>
                                        <div class="form-group select">
                                            <select name="vendor_country">
                                                <option value="">Select Country</option>
                                                @foreach($countries as $country)
                                                    <option {{$vendorPersonalDetail->country==$country->country_name ? 'selected': ''}} value="{{$country->country_name }}">{{$country->country_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Vendor State</label>
                                        <input type="text" name="vendor_state" class="form-control"
                                               id="vendor_state" placeholder="Enter your state"
                                               value="{{$vendorPersonalDetail->state}}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Vendor city</label>
                                        <input type="text" name="vendor_city" class="form-control"
                                               id="vendor_city" placeholder="Enter your city"
                                               value="{{$vendorPersonalDetail->city}}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Vendor Mobile</label>
                                        <input type="text" name="vendor_mobile" class="form-control"
                                               id="vendor_mobile" placeholder="Enter your mobile"
                                               value="{{$vendorPersonalDetail->mobile}}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Vendor Pincode</label>
                                        <input type="text" name="vendor_pincode" class="form-control"
                                               id="vendor_pincode" placeholder="Enter your pincode"
                                               value="{{$vendorPersonalDetail->pincode}}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for=mobile">Vendor Image</label>
                                        <a href="{{asset($vendorPersonalDetail->image)}}" target="_blank"
                                           title="View Recent Image"><img src="{{asset($vendorPersonalDetail->image)}}"
                                                                          style="width: 70px;height: 50px;"></a>
                                        <input type="file" name="vendor_image" class="form-control" id="vendor_image"
                                               accept="image/*">
                                    </div>
                                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            @if($slug=='shop')
                <div class="row">
                    <div class="col-md-10 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                @if(Session::has('msg'))
                                    <div style="display: inline-block"
                                         class="alert alert-success alert-dismissible fade show" role="alert">
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
                                <h4 class="card-title">Update Vendor Shop Details</h4>
                                <form action="{{route('admin.update.vendor.details',['slug'=>$slug])}}" class="forms-sample" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label>Admin Username/Email</label>
                                        <input class="form-control" readonly
                                               value="{{Auth::guard('admin')->user()->email}}">
                                    </div>
                                   <div class="row">
                                       <div class="form-group col-md-6">
                                           <label for="name">Shop Name</label>
                                           <input type="text" name="shop_name" class="form-control" id="shop_name"
                                                  placeholder="Enter your shop name" value="{{$vendorShopDetail->shop_name}}" required>
                                       </div>
                                       <div class="form-group col-md-6">
                                           <label for="name">Shop Address</label>
                                           <input type="text" name="shop_address" class="form-control" id="shop_address"
                                                  placeholder="Enter your shop address" value="{{$vendorShopDetail->shop_address}}" required>
                                       </div>
                                   </div>
                                    <div class="row">
                                        <div class="form-group  col-md-6">
                                            <label for="name">Shop Country</label>
                                            <div class="form-group select">
                                              <select name="shop_country">
                                                  <option value="">Select Country</option>
                                                  @foreach($countries as $country)
                                                      <option {{$vendorShopDetail->shop_country==$country->country_name ? 'selected': ''}} value="{{$country->country_name}}" > {{$country->country_name}}</option>
                                                  @endforeach
                                              </select>
                                          </div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="name">Shop State</label>
                                            <input type="text" name="shop_state" class="form-control" id="shop_state"
                                                   placeholder="Enter your shop state" value="{{$vendorShopDetail->shop_state}}" required>
                                        </div>
                                    </div>
                                   <div class="row">
                                       <div class="form-group col-md-6">
                                           <label for="name">Shop City</label>
                                           <input type="text" name="shop_city" class="form-control" id="shop_city"
                                                  placeholder="Enter your shop city" value="{{$vendorShopDetail->shop_city}}" required>
                                       </div>
                                       <div class="form-group col-md-6">
                                           <label for="name">Shop Mobile</label>
                                           <input type="text" name="shop_mobile" class="form-control" id="shop_mobile"
                                                  placeholder="Enter your shop mobile number" value="{{$vendorShopDetail->shop_mobile}}" required>
                                       </div>
                                   </div>
                                   <div class="row">
                                       <div class="form-group col-md-6">
                                           <label for="name">Shop Email</label>
                                           <input type="text" name="shop_email" class="form-control" id="shop_email"
                                                  placeholder="Enter your shop email" value="{{$vendorShopDetail->shop_email}}" required>
                                       </div>
                                       <div class="form-group col-md-6">
                                           <label for="name">Shop Website</label>
                                           <input type="text" name="shop_website" class="form-control" id="shop_website"
                                                  placeholder="Enter your shop website" value="{{$vendorShopDetail->shop_website}}" required>
                                       </div>
                                   </div>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for="name">Shop Address Proof</label>
                                            <!-- proff option will be added from a table dynamically later and select option will be available--->
                                            <div class="form-group select">
                                                <select name="address_proof" required>
                                                    <option selected disabled>Select address proof</option>
                                                    <option value="Passport" {{$vendorShopDetail->address_proof == "Passport" ? 'selected' : ''}}>Passport</option>
                                                    <option value="NID" {{$vendorShopDetail->address_proof == "NID" ? 'selected' : ''}}>NID Card</option>
                                                    <option value="Lisence Card" {{$vendorShopDetail->address_proof == "Lisence Card" ? 'selected' : ''}}>Lisence Card</option>
                                                    <option value="Driving Lisence" {{$vendorShopDetail->address_proof == "Driving Lisence" ? 'selected' : ''}}>Driving Lisence</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="name"> Business License Number</label>
                                            <input type="text" name="business_license_number" class="form-control" id="business_license_number"
                                                   placeholder="Enter your businessnlicense number" value="{{$vendorShopDetail->business_license_number}}" required>
                                        </div>

                                    </div>
                                    <div class="form-group">
                                        <label for="name">Address Proof Image</label>
                                        <img src="{{asset($vendorShopDetail->address_proof_image)}}" style="width: 40px;height: 40px;">
                                        <input type="file" name="address_proof_image" class="form-control" id="address_proof_image">
                                    </div>
                                   <div class="row">
                                       <div class="form-group col-md-6">
                                           <label for="name"> Business GST Number</label>
                                           <input type="text" name="gst_number" class="form-control" id="gst_number"
                                                  placeholder="Enter your gst number" value="{{$vendorShopDetail->gst_number}}" required>
                                       </div>
                                       <div class="form-group col-md-6">
                                           <label for="name"> Business PAN Number</label>
                                           <input type="text" name="pan_number" class="form-control" id="pan_number"
                                                  placeholder="Enter your pan number" value="{{$vendorShopDetail->pan_number}}" required>
                                       </div>
                                   </div>

                                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            @if($slug=='bank')
                <div class="row">
                    <div class="col-md-10 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                @if(Session::has('msg'))
                                    <div style="display: inline-block"
                                         class="alert alert-success alert-dismissible fade show" role="alert">
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

                                <h4 class="card-title">Update Vendor Bank Detail</h4>
                                <form action="{{route('admin.update.vendor.details',['slug'=>$slug])}}" class="forms-sample" method="post"
                                      id="#" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label>Admin Username/Email</label>
                                        <input class="form-control" readonly value="{{Auth::guard('admin')->user()->email}}">
                                    </div>
                                    <div class="form-group">
                                        <label for=mobile">Account Holder Name</label>
                                        <input type="text" name="ac_holder_name" class="form-control" id="ac_holder_name"
                                               placeholder="Enter Account Holder Name" value="{{$vendorBankDetail->account_holder_name}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Bank Name</label>
                                        <input type="text" name="bank_name" class="form-control"
                                               id="bank_name" placeholder="Enter your bank name" value="{{$vendorBankDetail->bank_name}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Account Number</label>
                                        <input type="text" name="account_number" class="form-control"
                                               id="account_number" placeholder="Enter your bank account number" value="{{$vendorBankDetail->account_number}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Bank Ifsc_Code</label>
                                        <input type="text" name="bank_ifsc_code" class="form-control" id="bank_ifsc_code" placeholder="Enter your bank Ifsc Code" value="{{$vendorBankDetail->bank_ifsc_code}}">
                                    </div>
                                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
@endsection
