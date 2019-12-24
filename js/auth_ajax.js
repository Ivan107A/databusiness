$(document).ready(function() {
    $("#do_reg").click(
        function(){
            sendAjaxForm('ajaxResult', 'formRegForm', '/ajax/auth.php');
            return false;
        }
    );

    $("#do_login").click(
        function(){
            sendAjaxForm('ajaxResult', 'formLogForm', '/ajax/auth.php');
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
            if(response == 'ok')
            {
                location.reload();
            }
            else
            {
                $('#' + result_form).html(response + '<hr>');
            }
        },
    });
}