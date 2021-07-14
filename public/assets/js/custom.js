function calLeavesAllowed(date_ = false) {
    var etype = $('#emp_type').val();
    var ecat = $('#emp_category_id').val();
    var tdate = $('#reg_date').val();
    if (etype == '1' && ecat == '3') {
        var month = new Date(tdate).getMonth() + 1;
        var day = new Date(tdate).getDate();
        var per_month = 20 / 12;
        month = 12 - month;
        if (day <= 15) {
            month = month + 1;
        }
        var allowed = per_month * month;
        $('#leaves_allowed').val(parseInt(allowed));
    }
}
$(function () {
    if ($('#short-leave').is(':checked')) {
        console.log('here');
        $('#half-leave-section').css('display', 'block');
    }
    else {
        console.log('here in not');
        $('#half-leave-section').css('display', 'none');
    }

    calLeavesAllowed();
    $('#leave_type').on('change', function () {
        var leave_type_value = $('#leave_type').val();
        var leave_type = $('#leave_type option:selected').text();
        if (leave_type_value != '') {
            $('#leave_subject').val(leave_type);
        }
        else {
            $('#leave_subject').val('');
        }
    });

    var today = new Date();
    var dd = String(today.getDate()).padStart(2, '0');
    var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
    var yyyy = today.getFullYear();

    today = mm + '/' + dd + '/' + yyyy;
    $('#reg_date').datepicker({
        // value: today,
        maxDate: new Date,
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
            // $('#reg_date').attr('disabled', true);
            // $('#leaves_allowed').attr('disabled', true);
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
            $('#leaves_allowed').attr('readonly', true);
        }
        else {

            $('#leaves_allowed').val('');
            if (etype != '1')
                $('#leaves_allowed').attr('readonly', false);
        }
        calLeavesAllowed();
    });
    $('#reg_date').on('change', function () {
        calLeavesAllowed();
    });

    $('.select2').select2();
    $("#example1").DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": true,
        "ordering": true,
        "aaSorting": [],
        "info": true,
        "autoWidth": false,
        "responsive": true,
        "select": true,
        "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
    });
    $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": true,
        "ordering": true,
        "aaSorting": [],
        "info": true,
        "autoWidth": false,
        "responsive": true,
        "select": true,
        "lengthMenu": [[10, 25, 50, "All"]]
    });
    //    $("#reservationdate").datepicker({
    //        minDate: new Date()
    //    }).focus(function () {
    //        $(this).prop("autocomplete", "off");
    //    });
    var singleDate = false;
    $('#leave_date').daterangepicker({
        minDate: new Date(),
        isInvalidDate: function (date) {
            // console.log(date);
            if (date.day() == 0 || date.day() == 6)
                return true;
            var disabled = [moment("2021-07-14")];
            console.log(disabled);
            var mdate = moment("2017-10-10")
            if (date && disabled.indexOf(date) > -1) {
                console.log('here in if');
                return true;
            } else {
                console.log('here in else');
                return false;
            }
            return false;
        },
        disableDates: function (date) {
            console.log(date);
            var disabled = [13, 14, 20, 21];
            if (date && disabled.indexOf(date.getDate()) > -1) {
                return true;
            } else {
                return false;
            }
        },
        singleDatePicker: $('#leave_date').attr('single') == 1 ? true : singleDate,
    }).focus(function () {
        $(this).prop("autocomplete", "off");
    });
    $('#leave_date').on('change.datepicker', function (ev) {

        if ($('#short-leave').prop("checked") == false) {
            var daterange = $('#leave_date').val().split('-')
            var start_ = new Date(daterange[0]);
            var end_ = new Date(daterange[1]);
            // initial total
            var totalBusinessDays = 0;
            // normalize both start and end to beginning of the day
            start_.setHours(0, 0, 0, 0);
            end_.setHours(0, 0, 0, 0);
            var current = new Date(start_);
            current.setDate(current.getDate() + 1);
            var day;
            // loop through each day, checking
            while (current <= end_) {
                day = current.getDay();
                if (day >= 1 && day <= 5) {
                    ++totalBusinessDays;
                }
                current.setDate(current.getDate() + 1);
            }
            $('#days').val(totalBusinessDays + 1);
        }
    });
    $('#short-leave').on('change', function () {
        if ($(this).prop("checked") == true) {
            singleDate = true;
            $('#leave_date').daterangepicker({
                minDate: new Date(),
                isInvalidDate: function (date) {
                    if (date.day() == 0 || date.day() == 6)
                        return true;
                    return false;
                },
                singleDatePicker: singleDate,
            }).focus(function () {
                $(this).prop("autocomplete", "off");
            });

            $('#leave_date').val('');
            $('#leave_date').data('daterangepicker').setStartDate(moment());
            $('#leave_date').data('daterangepicker').setEndDate(moment());
            //            $('.single-date').css('display', 'block');
            //            $('.date-range').css('display', 'none');
            $('.half-leave-section').css('display', 'block');
            $('#days').val('0.5');
        } else {
            singleDate = false;
            $('#leave_date').daterangepicker({
                minDate: new Date(),
                isInvalidDate: function (date) {
                    if (date.day() == 0 || date.day() == 6)
                        return true;
                    return false;
                },
                singleDatePicker: singleDate,
            }).focus(function () {
                $(this).prop("autocomplete", "off");
            });
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