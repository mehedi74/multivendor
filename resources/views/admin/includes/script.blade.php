<!-- plugins:js -->
<script src="{{asset('assets')}}/admin/vendors/js/vendor.bundle.base.js"></script>
<!-- endinject -->
<!-- Plugin js for this page -->
<script src="{{asset('assets')}}/admin/vendors/chart.js/Chart.min.js"></script>
<!-- End plugin js for this page -->
<!-- inject:js -->
<script src="{{asset('assets')}}/admin/js/off-canvas.js"></script>
<script src="{{asset('assets')}}/admin/js/hoverable-collapse.js"></script>
<script src="{{asset('assets')}}/admin/js/template.js"></script>
<script src="{{asset('assets')}}/admin/js/settings.js"></script>
<script src="{{asset('assets')}}/admin/js/todolist.js"></script>
<!-- endinject -->
<!-- Custom js for this page-->
<script src="{{asset('assets')}}/admin/js/dashboard.js"></script>
<script src="{{asset('assets')}}/admin/js/Chart.roundedBarCharts.js"></script>
<script src="{{asset('assets')}}/admin/js/custom.js"></script>

<!-- Dropify image upload  js for this page-->
<script src="{{asset('assets')}}/admin/js/dropify.min.js"></script>

<!-- For DataTable Script-->
<script src="{{asset('assets')}}/admin/js/jquery-3.5.1.js"></script>
<script src="{{asset('assets')}}/admin/js/jquery.dataTables.min.js"></script>
<script src="{{asset('assets')}}/admin/js/dataTables.bootstrap4.min.js"></script>

<!-- For sweetalert2 Script-->
<script src="{{asset('assets')}}/admin/js/sweetalert.js"></script>

<script>
    $(document).ready(function () {

        $('.nav-item').removeClass('active');
        $('.nav-link').removeClass('active');

        /*  confirm delete by simple javascript......
          $('.confirm-delete').click(function (){
              var title=$(this).attr('attr');
              if(confirm('Are you sure to delete '+title+'?')){
                  return true;
              }else{
                  return false;
              }
          });
          */

        // confirm delete by sweetalert  javascript......
        $(".confirmDelete").click(function () {
            var module = $(this).attr('module');
            var moduleId = $(this).attr('moduleId');
            Swal.fire({
                title: 'Are you sure to delete ' + module + '?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    //all module delete route after alert...
                    if (module === 'Category') {
                        window.location = "{{url('/admin/category/delete')}}" + moduleId;
                    } else if (module === 'Section') {
                        window.location = "{{url('/admin/section/delete')}}" + moduleId;
                    } else if (module === 'SubCategory') {
                        window.location = "{{url('/admin/sub-category/delete')}}" + moduleId;
                    } else if (module === 'Brand') {
                        window.location = "{{url('/admin/brand/delete')}}" + moduleId;
                    }else if (module === 'Product') {
                        window.location = "{{url('/admin/product/delete')}}" + moduleId;

                    //super-admin delete all admin from here after alert...
                    } else if (module === 'Vendor' || module === 'Admin' || module === 'Subadmin') {
                        window.location = "{{url('/admin/delete')}}" + moduleId;
                    }
                }
            })
        });

        //Success msg for any status/category/any module update...just add attr value according to module..
        $(".success-msg").click(function () {
            var attribute = $(this).attr('attr');
            Swal.fire({
                icon: 'success',
                title: attribute + ' updated successfully',
                showConfirmButton: false,
                timer: 50000,
            });
        });

        $('#example').DataTable();

        $("#current_password").keyup(function () {
            var current_password = $("#current_password").val();
            // alert(current_password);
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: "POST",
                url: "{{route('admin.check-current-password')}}",
                data: {current_password: current_password},
                dataType: "JSON",
                success: function (response) {
                    if (response === 1) {
                        $("#recent_password").html("<font color='green'>Correct Password!</font>");
                    } else if (response === 0) {
                        $("#recent_password").html("<font color='red'>Incorrect Password!</font>");
                    }
                },
                error: function () {
                    alert('Error');
                },
            });
        });
        $("#subCatId").on('change', function () {
            var subCatId = $("#subCatId").val();
            // alert(subCatId);
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: "POST",
                url: "{{route('product.check-current-section')}}",
                data: {subCatId: subCatId},
                dataType: "JSON",
                success: function (response) {
                    var brandId= $('#brand_id');
                    brandId.empty();
                    var option='';
                    option += '<option value="" disabled selected>--Select Brand--</option>' ;
                    $.each(response, function (key,brand){
                        option += '<option value="'+brand.id+'">'+brand.name+'</option>' ;
                    });
                    brandId.append(option);
                },
                error: function () {
                    alert('Error');
                },
            });
        });
        $("#section_id").on('change', function () {
            var section_id = $("#section_id").val();
            // alert(subCatId);
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: "POST",
                url: "{{route('select-all-category')}}",
                data: {section_id: section_id},
                dataType: "JSON",
                success: function (response) {
                    var catId= $('#catId');
                    catId.empty();
                    var option='';
                    option += '<option value="" disabled selected>--Select Category--</option>' ;
                    $.each(response, function (key,category){
                        option += '<option value="'+category.id+'">'+category.name+'</option>' ;
                    });
                    catId.append(option);
                },
                error: function () {
                    alert('Error');
                },
            });
        });



        //status update with ajax...realtime...should be laern...
    });
</script>

{{--<script>--}}
{{--    //multistep form js--}}

{{--    var currentTab = 0; // Current tab is set to be the first tab (0)--}}
{{--    showTab(currentTab); // Display the current tab--}}

{{--    function showTab(n) {--}}
{{--        // This function will display the specified tab of the form ...--}}
{{--        var x = document.getElementsByClassName("tab");--}}
{{--        x[n].style.display = "block";--}}
{{--        // ... and fix the Previous/Next buttons:--}}
{{--        if (n == 0) {--}}
{{--            document.getElementById("prevBtn").style.display = "none";--}}
{{--            document.getElementById("nextBtn").style.display = "inline";--}}
{{--        } else {--}}
{{--            document.getElementById("prevBtn").style.display = "inline";--}}
{{--            document.getElementById("nextBtn").style.display = "inline";--}}
{{--        }--}}
{{--        if (n == (x.length - 1)) {--}}
{{--            document.getElementById("nextBtn").style.display = "none";--}}
{{--        } else {--}}
{{--            document.getElementById("nextBtn").innerHTML = "Next";--}}
{{--        }--}}
{{--        // ... and run a function that displays the correct step indicator:--}}
{{--        fixStepIndicator(n)--}}
{{--    }--}}

{{--    function nextPrev(n) {--}}
{{--        // This function will figure out which tab to display--}}
{{--        var x = document.getElementsByClassName("tab");--}}
{{--        // Exit the function if any field in the current tab is invalid:--}}
{{--        if (n == 1 && !validateForm()) return false;--}}
{{--        // Hide the current tab:--}}
{{--        x[currentTab].style.display = "none";--}}
{{--        // Increase or decrease the current tab by 1:--}}
{{--        currentTab = currentTab + n;--}}
{{--        // if you have reached the end of the form... :--}}
{{--        if (currentTab >= x.length) {--}}
{{--            return false;--}}
{{--        }--}}
{{--        // Otherwise, display the correct tab:--}}
{{--        showTab(currentTab);--}}
{{--    }--}}

{{--    function validateForm() {--}}
{{--        // This function deals with validation of the form fields--}}
{{--        var x, y, i, valid = true;--}}
{{--        x = document.getElementsByClassName("tab");--}}
{{--        y = x[currentTab].getElementsByTagName("input");--}}
{{--        // A loop that checks every input field in the current tab:--}}
{{--        for (i = 0; i < y.length; i++) {--}}
{{--            // If a field is empty...--}}
{{--            if (y[i].value == "") {--}}
{{--                // add an "invalid" class to the field:--}}
{{--                y[i].className += " valid";--}}
{{--                // and set the current valid status to false:--}}
{{--                valid = true;--}}
{{--            }--}}
{{--        }--}}
{{--        // If the valid status is true, mark the step as finished and valid:--}}
{{--        if (valid) {--}}
{{--            document.getElementsByClassName("step")[currentTab].className += " finish";--}}
{{--        }--}}
{{--        return valid; // return the valid status--}}
{{--    }--}}

{{--    function fixStepIndicator(n) {--}}
{{--        // This function removes the "active" class of all steps...--}}
{{--        var i, x = document.getElementsByClassName("step");--}}
{{--        for (i = 0; i < x.length; i++) {--}}
{{--            x[i].className = x[i].className.replace("active", "");--}}
{{--        }--}}
{{--        //... and adds the "active" class to the current step:--}}
{{--        x[n].className += " active";--}}
{{--    }--}}

{{--</script>--}}
