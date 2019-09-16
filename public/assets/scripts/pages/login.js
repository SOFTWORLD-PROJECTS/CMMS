$(function() {
    $('.login-form input').keypress(function(e) {
        if (e.which == 13) {
            $('.login-form').submit();
            return false;
        }
    });
})