$(function () {
    $("#job_select").change(function () {
        window.location.replace($(this).data('url') + "?job=" + $(this).val());
    })
});