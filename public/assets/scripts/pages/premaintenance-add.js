$(function() {
    $('.date-picker').datepicker({
        rtl: App.isRTL(),
        autoclose: true
    });

    $("input[name=service_unit]").change(function() {
        var service_unit = $(this).val();
        if(service_unit == 'date') {
            service_unit = 'month';
        }
        $(".service-unit-label").html(service_unit);
    })
})