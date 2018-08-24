 
loadAjax = function() {
    $('#converter-content').html("");
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
                alert($('#dec').val() + " = " + response);
                console.log('Success: ' + response);
                $('#dec').val('');
                $('#send').prop('disabled', false);
                writeAjax();
            },
            error: function (jqxhr, status, exception) {
                console.log('Error');
                $('#dec').val('');
                $('#send').prop('disabled', false);
            }
        });
    });
},
writeAjax = function () {
    $.getJSON('./database/converter.json', function (req) {
        console.log(req);
        var string = '';
        for (let i = 0; i < req.length; i++) {
            string += '<tr><td>' + JSON.stringify(Number(req[i][0]['decimal'])) + '</td>'
                + '<td>' + JSON.stringify(Number(req[i][0]['binary'])) + '</td></tr>';
        }
        $('#converter-content').append(string);
    });
},
clearConverterJson = function () {
    $.ajax({
        type: "POST",
        url: "php/clearJson.php",
        data: {
            database: 'converter',
        },
        dataType: "json",
        success: function (response) {
            alert("Base de dados apagada com sucesso...");
        },
        error: function (jqxhr, status, exception) {
            alert("Ocorreu um erro na operação...");
        }
    });
},
clearAllContent = function () {
    $('#converter-content').html("");
    $('#operations-content').html("");
}
 
$(document).ready( function () {
    $('#convert-form').submit( function (e) {
        e.preventDefault();
        if ($('#dec') !== null) {
            loadAjax();    
        } else {
            alert("Campo obrigatório");
        }
        
        $('#send').prop('disabled', true);
    });
    $('#clear-json').click( function (e) {
        e.preventDefault();
        clearConverterJson();
        clearAllContent();
    });
    writeAjax();
});
 