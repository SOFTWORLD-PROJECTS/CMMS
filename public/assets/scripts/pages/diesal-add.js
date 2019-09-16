jQuery(document).ready(function () {
    $('.date-picker').datepicker({
        rtl: App.isRTL(),
        autoclose: true
    });

    $("#diesal-add").click(function () {
        var container = $("#diesal-container");

        var children = container.children('tr');
        var maxID = 0;

        for (var i = 0; i < children.length; i++) {
            var id = $(children[i]).data('id');
            if (maxID < id)
                maxID = id;
        }

        maxID++;

        container.append(
            '<tr data-id="' + maxID + '">' +
            '<td>' +
            '     <div class="input-group date date-picker margin-bottom-5" data-date-format="yyyy-mm-dd">' +
            '         <input type="text" class="form-control form-filter input-sm" readonly  placeholder="Date" name="diesels[' + maxID + '][date]">' +
            '         <span class="input-group-btn"> <button class="btn btn-sm default" type="button"><i class="fa fa-calendar"></i> </button></span>' +
            '     </div>' +
            ' </td>' +
            ' <td>' +
            '     <input type="number" class="form-control form-filter input-sm" placeholder="Litre" name="diesels[' + maxID + '][litre]">' +
            ' </td>' +
            ' <td>' +
            '     <input type="text" class="form-control form-filter input-sm" placeholder="By"  name="diesels[' + maxID + '][by]" value="' + $("input[name=driver]").val() + '">' +
            ' </td>' +
            ' <td>' +
            '     <a href="javascript:;" class="btn btn-icon-only default btn-circle disal-delete-btn"><i class="fa fa-close"></i></a>' +
            ' </td>' +
            '</tr>');

        $('.date-picker').datepicker({
            rtl: App.isRTL(),
            autoclose: true
        });

        $(".disal-delete-btn").click(function () {
            $(this).parents('tr').remove();
        })
    })

    $(".disal-delete-btn").click(function () {
        $(this).parents('tr').remove();
    })
});