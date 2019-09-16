$(function () {
    $(".fileinput-view").click(function () {
        var img = $(this).parent().parent().prev().find('img');
        $("#image-view-modal img").attr('src', img.attr('src'));
        $("#image-view-modal").modal('show');
    });
})