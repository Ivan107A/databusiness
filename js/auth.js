$(document).ready(function () {
    $('#openReg').click(function () {
        $('#openReg').addClass('active');
        $('#openLog').removeClass('active');

        $('#formReg').show();
        $('#formLog').hide();
    });

    $('#openLog').click(function () {
        $('#openLog').addClass('active');
        $('#openReg').removeClass('active');

        $('#formLog').show();
        $('#formReg').hide();
    });
});