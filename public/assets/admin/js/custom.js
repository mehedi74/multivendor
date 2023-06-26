// $(document).ready(function () {
//     $("#current_password").keyup(function () {
//         var current_password = $("#current_password").val();
//         // alert(current_password);
//         $.ajax({
//             headers: {
//                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//             },
//             type: "POST",
//             url: "{{route('admin.check-current-password')}}",
//             data: {current_password: current_password},
//             dataType: "JSON",
//             success: function (response) {
//                 if (response === 1) {
//                     $("#recent_password").html("<font color='green'>Correct Password</font>");
//                 } else if (response === 0) {
//                     $("#recent_password").html("<font color='red'>InCorrect Password!</font>");
//                 }
//             },
//             error: function () {
//                 alert('Error');
//             },
//         });
//     });
// });
