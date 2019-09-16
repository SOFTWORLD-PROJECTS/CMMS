$(function() {
    $('.date-picker').datepicker({
        rtl: App.isRTL(),
        autoclose: true
    });

    $("input[name=record_type]").change(function() {
        var record_type = $(this).val();
        if(record_type == 'smu') {
            $("#smu-model").show();
            $("#hour-current-meter").show();
        }else {
            $("#smu-model").hide();
            $("#hour-current-meter").hide();
        }
    })
})