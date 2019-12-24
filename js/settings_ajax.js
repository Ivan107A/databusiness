$(document).ready(function() {
    $("#do_new_login").click(
        function(){
            sendAjaxForm('ajaxResultLogin', 'newLoginForm', '/ajax/settings.php');
            return false;
        }
    );

    $("#do_new_password").click(
        function(){
            sendAjaxForm('ajaxResultPassword', 'newPasswordForm', '/ajax/settings.php');
            return false;
        }
    );
});

function sendAjaxForm(result_form, ajax_form, url) {
    $.ajax({
        url: url,
        type: "POST",
        dataType: "html",
        data: $("#" + ajax_form).serialize(),
        success: function(response) {
            $('#' + result_form).html('<br>' + response);
        },
    });
}