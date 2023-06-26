    <link rel="stylesheet" href="{{asset('assets')}}/admin/vendors/feather/feather.css">
    <link rel="stylesheet" href="{{asset('assets')}}/admin/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="{{asset('assets')}}/admin/vendors/css/vendor.bundle.base.css">
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{asset('assets')}}/admin/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" type="text/css" href="{{asset('assets')}}/admin/js/select.dataTables.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{asset('assets')}}/admin/css/vertical-layout-light/style.css">

    <!-- drofify image upload css -->
    <link rel="stylesheet" href="{{asset('assets')}}/admin/css/custom/dropify.min.css" >

    <link rel="shortcut icon" href="{{asset('assets')}}/admin/images/favicon.png" />
    <link rel="stylesheet" href="{{asset('assets')}}/admin/css/custom/custom.css" >
    <link rel="stylesheet" href="{{asset('assets')}}/admin/vendors/mdi/css/materialdesignicons.min.css">

    <!-- DataTable css -->
    <link rel="stylesheet" href="{{asset('assets')}}/admin/css/bootstrap.css">
    <link rel="stylesheet" href="{{asset('assets')}}/admin/css/dataTables.bootstrap4.min.css">
    <style>
        .viewbtn{
            font-size: 18px;
            padding: 0px 4px;
            color: dodgerblue;
        }
        .activebtn{
            font-size: 18px;
            padding: 0px 4px;
            color: seagreen;
        }
        .editbtn{
            font-size: 18px;
            padding: 0px 4px;
            color: dodgerblue ;
        }
        .deactivebtn{
            font-size: 18px;
            padding: 0px 4px;
            color: mediumvioletred;
        }
        .deletebtn{
            font-size: 18px;
            padding: 0px 2px;
            color: red;
        }
        .btn-edit{
           border: none;
            background: none;
        }
        .activeli{
            background-color: #4B49AC !important;
            color: #ffffff !important;
        }
        .activea{
            color: #4B49AC; !important;
        }
        .red{
            color: red;
        }
        /*drag and drop image css*/
        .files input {
            outline: 2px dashed #92b0b3;
            outline-offset: -10px;
            -webkit-transition: outline-offset .15s ease-in-out, background-color .15s linear;
            transition: outline-offset .15s ease-in-out, background-color .15s linear;
            padding: 120px 0px 85px 35%;
            text-align: center !important;
            margin: 0;
            width: 100% !important;
        }
        .files input:focus{     outline: 2px dashed #92b0b3;  outline-offset: -10px;
            -webkit-transition: outline-offset .15s ease-in-out, background-color .15s linear;
            transition: outline-offset .15s ease-in-out, background-color .15s linear; border:1px solid #92b0b3;
        }
        .files{ position:relative}
        .files:after {  pointer-events: none;
            position: absolute;
            top: 60px;
            left: 0;
            width: 50px;
            right: 0;
            height: 56px;
            content: "";
            background-image: url(https://image.flaticon.com/icons/png/128/109/109612.png);
            display: block;
            margin: 0 auto;
            background-size: 100%;
            background-repeat: no-repeat;
        }
        .color input{ background-color:#f1f1f1;}
        .files:before {
            position: absolute;
            bottom: 10px;
            left: 0;  pointer-events: none;
            width: 100%;
            right: 0;
            height: 57px;
            content: " or drag it here. ";
            display: block;
            margin: 0 auto;
            color: #2ea591;
            font-weight: 600;
            text-transform: capitalize;
            text-align: center;
        }

        /*!* multistep form css*/
        /*#regForm {*/
        /*    background-color: #ffffff;*/
        /*}*/


        /*!* Mark input boxes that gets an error on validation: *!*/
        /*input.invalid {*/
        /*    background-color: #ffdddd;*/
        /*}*/

        /*!* Hide all steps by default: *!*/
        /*.tab {*/
        /*    display: none;*/
        /*}*/

        /*!* Make circles that indicate the steps of the form: *!*/
        /*.step {*/
        /*    height: 15px;*/
        /*    width: 15px;*/
        /*    margin: 0 2px;*/
        /*    background-color: #bbbbbb;*/
        /*    border: none;*/
        /*    border-radius: 50%;*/
        /*    display: inline-block;*/
        /*    opacity: 0.5;*/
        /*}*/

        /*!* Mark the active step: *!*/
        /*.step.active {*/
        /*    opacity: 1;*/
        /*}*/

        /*!* Mark the steps that are finished and valid: *!*/
        /*.step.finish {*/
        /*    background-color: #04AA6D;*/
        /*}*/
        /**!*/
    </style>



