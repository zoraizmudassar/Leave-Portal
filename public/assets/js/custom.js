function calLeavesAllowed(date_ = false) {
    var etype = $('#emp_type').val();
    var ecat = $('#emp_category_id').val();
    var tdate = $('#reg_date').val();
    if (etype == '1' && ecat == '3') {
        var month = new Date(tdate).getMonth();
        var day = new Date(tdate).getDay();
        var per_month = 20 / 12;
        if (day >= 15) {
            month = month - 1;
        }
        var allowed = per_month * month;
        $('#leaves_allowed').val(allowed);
    }
}
$(function () {
    var today = new Date();
    var dd = String(today.getDate()).padStart(2, '0');
    var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
    var yyyy = today.getFullYear();

    today = mm + '/' + dd + '/' + yyyy;
    $('#reg_date').datepicker({
        value: today,
        // uiLibrary: 'bootstrap4',
        // "setDate": new Date(),
        // "autoclose": true
    });
    $('#emp_type').on('change', function () {
        var etype = $('#emp_type').val();
        var ecat = $('#emp_category_id').val();
        var tdate = $('#reg_date').val();
        if (etype == '1') {
            console.log('asdfasdf');
            var today = new Date();
            var dd = String(today.getDate()).padStart(2, '0');
            var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
            var yyyy = today.getFullYear();

            today = mm + '/' + dd + '/' + yyyy;
            $('#reg_date').val(today);
            $('#reg_date').attr('disabled', true);
            $('#leaves_allowed').attr('disabled', true);
        }
        else {
            $('#reg_date').attr('disabled', false);
            if (ecat == '3')
                $('#leaves_allowed').attr('disabled', false);
        }
        calLeavesAllowed();
    });
    $('#emp_category_id').on('change', function () {
        var etype = $('#emp_type').val();
        var ecat = $('#emp_category_id').val();
        var tdate = $('#reg_date').val();
        if ($('#emp_category_id').val() != '3') {
            $('#leaves_allowed').val(0);
            $('#leaves_allowed').attr('disabled', true);
        }
        else {

            $('#leaves_allowed').val('');
            if (etype != '1')
                $('#leaves_allowed').attr('disabled', false);
        }
        calLeavesAllowed();
    });
    $('#reg_date').on('change', function () {
        calLeavesAllowed();
    });

    // var a = $('#reg_date').val();

    // var d = new Date();
    // var month = d.getMonth() + 1;
    // var dateStr = month;
    // var cal = 12 - dateStr;
    // var div = 20 / 12;
    // var mul = div * cal;
    // var total = float2int(mul);
    // function float2int(value) {
    //     return value | 0;
    // }



    // $('#emp_category_id').on('change', function () {
    //     var empC_val = $('#emp_category_id').val();
    //     if (empC_val == "1") {
    //         $('#reg_date').attr('disabled', true);
    //         $('#leave').attr('disabled', true);
    //         $('#leave').attr('value', 0);
    //     }
    //     else if (empC_val == "2") {
    //         $('#reg_date').attr('disabled', true);
    //         $('#leave').attr('disabled', true);
    //         $('#leave').attr('value', 0);
    //     }
    //     else if (empC_val == "5") {
    //         $a = 12;
    //         $('#reg_date').attr('disabled', true);
    //         $('#leave').attr('disabled', true);
    //         $('#leave').val(total);
    //     }
    // });




    $('.select2').select2();
    $("#example1").DataTable({
        "responsive": true,
        "autoWidth": false,
    });
    $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
    });
    //    $("#reservationdate").datepicker({
    //        minDate: new Date()
    //    }).focus(function () {
    //        $(this).prop("autocomplete", "off");
    //    });

    $('#leave_date').daterangepicker({
        minDate: new Date()
    }).focus(function () {
        $(this).prop("autocomplete", "off");
    });
    $('#leave_date').on('change.datepicker', function (ev) {
        if ($('#short-leave').prop("checked") == false) {
            var daterange = $('#leave_date').val().split('-')
            var start = new Date(daterange[0]);
            var end = new Date(daterange[1]);
            var diff = new Date(end - start);
            var days = diff / 1000 / 60 / 60 / 24;
            $('#days').val(days + 1);
        }
    });
    $('#short-leave').on('change', function () {
        if ($(this).prop("checked") == true) {
            $('#leave_date').val('');
            $('#leave_date').data('daterangepicker').setStartDate(moment());
            $('#leave_date').data('daterangepicker').setEndDate(moment());
            //            $('.single-date').css('display', 'block');
            //            $('.date-range').css('display', 'none');
            $('.half-leave-section').css('display', 'block');
            $('#days').val('0.5');
        } else {
            //            $('#reservationdate').val('');
            //            $('.date-range').css('display', 'block');
            //            $('.single-date').css('display', 'none');
            $('.half-leave-section').css('display', 'none');
            $('#days').val('1');
        }
    });
    $('form').submit(function () {
        $(this).find('input[type=submit]').prop('disabled', true);
    });
    for (var i = 1; i <= 9; i++) {
        $("#checkall-1").click(function () {
            $(".check-1").prop('checked', $(this).prop('checked'));
        });
        $("#checkall-1").click(function () {
            $(".check-1").prop('checked', $(this).prop('checked'));
        });
        $("#checkall-2").click(function () {
            $(".check-2").prop('checked', $(this).prop('checked'));
        });
        $("#checkall-3").click(function () {
            $(".check-3").prop('checked', $(this).prop('checked'));
        });
        $("#checkall-4").click(function () {
            $(".check-4").prop('checked', $(this).prop('checked'));
        });
        $("#checkall-5").click(function () {
            $(".check-5").prop('checked', $(this).prop('checked'));
        });
        $("#checkall-6").click(function () {
            $(".check-6").prop('checked', $(this).prop('checked'));
        });
        $("#checkall-7").click(function () {
            $(".check-7").prop('checked', $(this).prop('checked'));
        });
        $("#checkall-8").click(function () {
            $(".check-8").prop('checked', $(this).prop('checked'));
        });
        $("#checkall-9").click(function () {
            $(".check-9").prop('checked', $(this).prop('checked'));
        });
        $('.check-9').change(function () {
            if ($('.check-9:checked').length == $('.check-9').length) {
                $('#checkall-9').prop('checked', true);
            } else {
                $('#checkall-9').prop('checked', false);
            }
        });
        $('.check-1').change(function () {
            if ($('.check-1:checked').length == $('.check-1').length) {
                $('#checkall-1').prop('checked', true);
            } else {
                $('#checkall-1').prop('checked', false);
            }
        });
        $('.check-2').change(function () {
            if ($('.check-2:checked').length == $('.check-2').length) {
                $('#checkall-2').prop('checked', true);
            } else {
                $('#checkall-2').prop('checked', false);
            }
        });
        $('.check-3').change(function () {
            if ($('.check-3:checked').length == $('.check-3').length) {
                $('#checkall-3').prop('checked', true);
            } else {
                $('#checkall-3').prop('checked', false);
            }
        });
        $('.check-4').change(function () {
            if ($('.check-:checked').length == $('.check-4').length) {
                $('#checkall-4').prop('checked', true);
            } else {
                $('#checkall-4').prop('checked', false);
            }
        });
        $('.check-5').change(function () {
            if ($('.check-5:checked').length == $('.check-5').length) {
                $('#checkall-5').prop('checked', true);
            } else {
                $('#checkall-5').prop('checked', false);
            }
        });
        $('.check-6').change(function () {
            if ($('.check-6:checked').length == $('.check-6').length) {
                $('#checkall-6').prop('checked', true);
            } else {
                $('#checkall-6').prop('checked', false);
            }
        });
        $('.check-7').change(function () {
            if ($('.check-7:checked').length == $('.check-7').length) {
                $('#checkall-7').prop('checked', true);
            } else {
                $('#checkall-7').prop('checked', false);
            }
        });
        $('.check-8').change(function () {
            if ($('.check-8:checked').length == $('.check-8').length) {
                $('#checkall-8').prop('checked', true);
            } else {
                $('#checkall-8').prop('checked', false);
            }
        });
        $('.check-9').change(function () {
            if ($('.check-9:checked').length == $('.check-9').length) {
                $('#checkall-9').prop('checked', true);
            } else {
                $('#checkall-9').prop('checked', false);
            }
        });
    }
});