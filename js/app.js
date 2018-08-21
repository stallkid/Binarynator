 
loadAjax = function() {
    console.time('put in database');
    $.getJSON('./database/data.json', function (request) {
        console.log(request);

        $.ajax({
            type: "POST",
            url: "php/binaryControl.php",
            data: {
                request: request,
                formData: $('#dec').val(),
            },
            dataType: "json",
            success: function (response) {
                alert(response);
                console.log('Success');
                $('#dec').val('');
                $('#send').prop('disabled', false);
            },
            error: function (jqxhr, status, exception) {
                console.log('Error');
                $('#dec').val('');
                $('#send').prop('disabled', false);
                console.timeEnd('put in database');
            }
        });
    });
}
 
$(document).ready( function () {
    $('#data-form').submit( function (e) {
        e.preventDefault();
        loadAjax();
        $('#send').prop('disabled', true);
    })
});
 