$(function () {
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
    for (var i = 1; i <= 9; i++)
    {
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