$(document).ready(function () {
    $('#submit').attr('disabled','disabled')
     $('.regular-text').each(function () {
        $('.regular-text').keyup(verifInput);
    })
});
function verifInput() { 
    var input = true;
    $('.regular-text').each(function () {
        if ($(this).val() == "") {
            input = false
        }
    })
    if (input) {
        $('#submit').removeAttr('disabled')
    } else {
        $('#submit').attr('disabled','disabled')
    }
}