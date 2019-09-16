jQuery(document).ready(function () {
    var datetime = moment().format('YYYY-MM-DD HH:mm:ss');
    $(".form_datetime").datetimepicker({
        autoclose: true,
        isRTL: App.isRTL(),
        format: "yyyy-mm-dd hh:ii:ss",
        pickerPosition: (App.isRTL() ? "bottom-right" : "bottom-left"),
        defaultDate: datetime
    });

    $('.date-picker').datepicker({
        rtl: App.isRTL(),
        autoclose: true
    });

    $(".form_datetime input").val(datetime);

    $('input[name=service_type]').change(function() {
        var service_type = $(this).val();

        if(service_type == 'self') {
            $("#parts-use-self-header").show();
            $("#service-self-header").show();
            $("#parts-use-vendor-header").hide();
            $("#service-vendor-header").hide();
        }else {
            $("#parts-use-vendor-header").show();
            $("#service-vendor-header").show();
            $("#parts-use-self-header").hide();
            $("#service-self-header").hide();
        }
    })

    $("#add-service").click(function () {
            showWorkOrderInputFirstMessage();
        }
    );

    $('#add-parts-use').click(function () {
        showWorkOrderInputFirstMessage();
    });

    $('#remark-save').click(function () {
        showWorkOrderInputFirstMessage();
    });

    $('#remark-show').click(function () {
        showWorkOrderInputFirstMessage();
    });

    $('#upload-pic').click(function(e){
        e.preventDefault();
        showWorkOrderInputFirstMessage();
    })

    function showWorkOrderInputFirstMessage() {
        toastr.error('First, You have to save all work order information.', 'Error!');
    }
});