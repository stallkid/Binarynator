$.ajaxSetup({
    cache: false
}); 

// CONVERTER AJAX
loadAjax = function() {
    $('#converter-content').html("");
    var t1 = performance.now();
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
                var t2 = performance.now();
                time = (t2 - t1);
                timeMsg = '<p><b>A operação levou: ' + time.toFixed(2) + 'ms</b></p>';
                alert($('#dec').val() + " = " + response);
                console.log('Success: ' + response);
                $('#dec').val('');
                $('#send').prop('disabled', false);
                $('#convert-time').append(timeMsg)
                writeAjax();
                
                console.log("Calculo leva "+ (t2 - t1) +" milissegundos");
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
    $('#search-content').html("");
    $('#convert-time').html("");
    $('#search-time').html("");
},
searchBinaryInJson = function () {
    var t3 = performance.now();
    string = '';
    $.getJSON('./database/binaries.json', function (req) {
        for(var i = 0;i < req[0].length; i++) {
            if (req[0][i]['Decimal'] == $('#dec').val()) {
                
                string += '<tr><td>' + req[0][i]['Decimal'] +'</td>'+
                    '<td>' + req[0][i]['Binary'] +'</td>' +
                    '</tr>';
            }
        }
        $('#search-content').append(string);
        var t4 = performance.now();
        time = (t4 - t3);
        timeMsg = '<p><b>A operação levou: ' + time.toFixed(2) + 'ms</b></p>';
        $('#search-time').append(timeMsg);
        console.log("Busca leva " + time + " milissegundos");
    });
},

//  OPERATORS AJAX
calculateAjax = function () {
    var string = '';
    $.ajax({
        type: "POST",
        url: "php/operationControl.php",
        data: {
            firstNumber: $('#first-numb').val(),
            operator: $('input[name=optradio]:checked').val(),
            secondNumber: $('#second-numb').val()
        },
        dataType: "json",
        success: function (response) {
            console.log(response);
            string += '<tr><td>'+ response[0]['first']['binary'] +'</td>'
                + '<td>' + response[0]['operation'] + '</td>'
                + '<td>' + response[0]['second']['binary'] + '</td>'
                + '<td>' + response[0]['result']['result_bin'] + '</td></tr>';

            $('#operations-content').append(string);
        },
        error: function (jqxhr, status, exception) {
            
        }
    });
}
$(document).ready( function () {
    // FORMULÁRIO DE CONVERSÃO
    $('#convert-form').submit( function (e) {
        e.preventDefault();
        if ($('#dec') !== null) {
            loadAjax();
            searchBinaryInJson();
        } else {
            alert("Campo obrigatório");
        }
        
        $('#send').prop('disabled', true);
    });
    // FORMULÁRIO DE OPERAÇÕES
    $('#operation-form').submit( function (e) {
        e.preventDefault();
        if ($('#first-num') !== null && $('#second-num') !== null) {
            calculateAjax();
        }
    });
    $('#clear-json').click( function (e) {
        e.preventDefault();
        clearConverterJson();
        clearAllContent();
    });
    writeAjax();
});
 