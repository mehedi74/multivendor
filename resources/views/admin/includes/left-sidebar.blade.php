<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a @if(Session::get('page')=='dashboard') style="background-color: #4B49AC; color: #ffffff;"
               @endif class="nav-link" href="{{route('admin.home')}}">
                <i class="icon-grid menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>

        <!--After login if admin is superadmin itself-->
        @if(Auth::guard('admin')->user()->type=='superadmin')

            <li class="nav-item">
                <a @if(Session::get('page')=='update_password' || Session::get('page')=='update_deatils') style="background-color: #4B49AC; color: #ffffff;"
                   @endif  class="nav-link" data-toggle="collapse" href="#settings" aria-expanded="false"
                   aria-controls="ui-basic">
                    <i class="icon-layout menu-icon"></i>
                    <span class="menu-title">Settings</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="settings">
                    <ul class="nav flex-column sub-menu" style="background: #ffffff !important;">
                        <li class="nav-item"><a
                                @if(Session::get('page')=='update_password')style="background-color: #4B49AC; color: #ffffff;"
                                @endif style="color: #4B49AC; !important;" class="nav-link"
                                href="{{route('admin.update.password')}}">Update Admin Password</a>
                        </li>
                        <li class="nav-item"><a
                                @if(Session::get('page')=='update_deatils')style="background-color: #4B49AC; color: #ffffff;"
                                @endif style="color: #4B49AC; !important;" class="nav-link"
                                href="{{route('admin.update.details')}}">Update Admin Details</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a @if(Session::get('page')=='all' || Session::get('page')=='admin'|| Session::get('page')=='vendor' || Session::get('page')=='subadmin' ) style="background-color: #4B49AC; color: #ffffff;"
                   @endif class="nav-link" data-toggle="collapse" href="#adminmanagement" aria-expanded="false"
                   aria-controls="form-elements">
                    <i class="icon-columns menu-icon"></i>
                    <span class="menu-title">Admin Management</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="adminmanagement">
                    <ul class="nav flex-column sub-menu" style="background: #ffffff !important;">
                        <li class="nav-item"><a
                                @if(Session::get('page')=='admin')  style="background-color: #4B49AC; color: #ffffff;"
                                @endif class="nav-link" style="color: #4B49AC; !important;"
                                href="{{route('superadmin.view.admin',['slug'=>'admin'])}}">Admins</a>
                        <li class="nav-item"><a
                                @if(Session::get('page')=='vendor')  style="background-color: #4B49AC; color: #ffffff;"
                                @endif class="nav-link" style="color: #4B49AC; !important;"
                                href="{{route('superadmin.view.admin',['slug'=>'vendor'])}}">Vendors</a>
                        <li class="nav-item"><a
                                @if(Session::get('page')=='subadmin')  style="background-color: #4B49AC; color: #ffffff;"
                                @endif class="nav-link" style="color: #4B49AC; !important;"
                                href="{{route('superadmin.view.admin',['slug'=>'subadmin'])}}">Sub
                                Admins</a>
                        <li class="nav-item"><a
                                @if(Session::get('page')=='all')  style="background-color: #4B49AC; color: #ffffff;"
                                @endif class="nav-link" style="color: #4B49AC; !important;"
                                href="{{route('superadmin.view.admin',['slug'=>'all'])}}">All Admins</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a @if(Session::get('page')=='sections' || Session::get('page')=='categories'|| Session::get('page')=='subcategories'||
                    Session::get('page')=='products'|| Session::get('page')=='brands') style="background-color: #4B49AC; color: #ffffff;"
                   @endif class="nav-link" data-toggle="collapse" href="#catalogue" aria-expanded="false"
                   aria-controls="form-elements">
                    <i class="icon-columns menu-icon"></i>
                    <span class="menu-title">Catalogue Management</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="catalogue">
                    <ul class="nav flex-column sub-menu" style="background: #ffffff !important;">
                        <li class="nav-item"><a
                                @if(Session::get('page')=='sections')  style="background-color: #4B49AC; color: #ffffff;"
                                @endif class="nav-link" style="color: #4B49AC; !important;"
                                href="{{route('section.index')}}">Sections</a></li>
                        <li class="nav-item"><a
                                @if(Session::get('page')=='categories')  style="background-color: #4B49AC; color: #ffffff;"
                                @endif class="nav-link" style="color: #4B49AC; !important;"
                                href="{{route('categories.index')}}">Categories</a></li>
                        <li class="nav-item"><a
                                @if(Session::get('page')=='subcategories')  style="background-color: #4B49AC; color: #ffffff;"
                                @endif class="nav-link" style="color: #4B49AC; !important;"
                                href="{{route('sub-categories.index')}}">Sub-Categories</a></li>
                        <li class="nav-item"><a
                                @if(Session::get('page')=='brands')  style="background-color: #4B49AC; color: #ffffff;"
                                @endif class="nav-link" style="color: #4B49AC; !important;"
                                href="{{route('brand.index')}}">Brands</a></li>
                        <li class="nav-item"><a
                                @if(Session::get('page')=='products')  style="background-color: #4B49AC; color: #ffffff;"
                                @endif class="nav-link" style="color: #4B49AC; !important;"
                                href="{{route('product.index')}}">Products</a></li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#usermanagement" aria-expanded="false"
                   aria-controls="form-elements">
                    <i class="icon-columns menu-icon"></i>
                    <span class="menu-title">Customer Management</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="usermanagement">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"><a class="nav-link" href="#">Customer</a>
                        <li class="nav-item"><a class="nav-link" href="#">Subscribers</a>
                        </li>
                    </ul>
                </div>
            </li>
        @endif

        <!--After login if admin is type of vendor -->
        @if(Auth::guard('admin')->user()->type=='vendor')
            <li class="nav-item">
                <a class="nav-link"
                   aria-controls="ui-basic" href="{{route('admin.view.vendor.details',Auth::guard('admin')->user()->vendor_id)}}" @if(Session::get('page')=='vendor-detail') style="background-color: #4B49AC; color: #ffffff;"
                    @endif>
                    <i class="ti-user" style="margin-right: 10px;"></i>
                    View Profile
                </a>
            </li>
            <li class="nav-item">
                <a @if(Session::get('page')=='bank' || Session::get('page')=='shop' || Session::get('page')=='Personal') style="background-color: #4B49AC; color: #ffffff;"
                   @endif class="nav-link" data-toggle="collapse" href="#vendor" aria-expanded="false"
                   aria-controls="ui-basic">
                    <i class="icon-layout menu-icon"></i>
                    <span class="menu-title">Update Vendor Details</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="vendor">
                    <ul class="nav flex-column sub-menu" style="background: #ffffff !important;">
                        <li class="nav-item"><a
                                @if(Session::get('page')=='personal') style="background-color: #4B49AC; color: #ffffff;"
                                @endif  style="color: #4B49AC; !important;" class="nav-link"
                                href="{{route('admin.update.vendor.details',['slug'=>'personal'])}}">Personal
                                Details</a>
                        </li>
                        <li class="nav-item"><a
                                @if(Session::get('page')=='shop') style="background-color: #4B49AC; color: #ffffff;"
                                @endif style="color: #4B49AC; !important;" class="nav-link"
                                href="{{route('admin.update.vendor.details',['slug'=>'shop'])}}">Shop
                                Details</a>
                        </li>
                        <li class="nav-item"><a
                                @if(Session::get('page')=='bank') style="background-color: #4B49AC; color: #ffffff;"
                                @endif style="color: #4B49AC; !important;" class="nav-link"
                                href="{{route('admin.update.vendor.details',['slug'=>'bank'])}}">Bank
                                Details</a>
                        </li>
                        <li class="nav-item"><a
                                @if(Session::get('page')=='update_password') style="background-color: #4B49AC; color: #ffffff;"
                                @endif  style="color: #4B49AC; !important;" class="nav-link"
                                href="{{route('admin.update.password')}}">Update Password</a>
                        </li>
                    </ul>
                </div>
            </li>
        @endif
    </ul>
</nav>
