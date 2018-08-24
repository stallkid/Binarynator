 
loadAjax = function() {
    console.time('put in database');
    $('#table-content').html("");
    $.getJSON('./database/converter.json', function (request) {
        
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
                writeAjax();

            },
            error: function (jqxhr, status, exception) {
                console.log('Error');
                $('#dec').val('');
                $('#send').prop('disabled', false);
                console.timeEnd('put in database');
            }
        });
    });
},
writeAjax = function () {
    $.getJSON('./database/converter.json', function (request) {
        var string = '';
        for (let i = 0; i < request.length; i++) {
            string += '<tr><td>' + JSON.stringify(request[i][0]['decimal']) + '</td>'
                + '<td>' + JSON.stringify(request[i][0]['binary']) + '</td></tr>';
        }
        $('#table-content').append(string);
    });
}
clearJson = function () {
    $.post("./../php/clearJson.php"), function (data) {
        console.log(data);
    }
}
 
$(document).ready( function () {
    $('#data-form').submit( function (e) {
        e.preventDefault();
        loadAjax();
        $('#send').prop('disabled', true);
    });
    $('#clear-json').click( function (e) {
        e.preventDefault();
    });
    writeAjax();
});
 