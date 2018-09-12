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
                $('#convert-time').html(timeMsg)
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
        $('#search-time').html(timeMsg);
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
            for(var i = 0; i < response.length; i++) {
                string += '<tr><td>(Decimal: ' + response[i]['first']['decimal'] + ' | Binario: ' + response[i]['first']['binary'] +')</td>'
                    + '<td>' + response[i]['operation'] + '</td>'
                    + '<td>(Decimal: ' + response[i]['second']['decimal'] + ' | Binario: ' + response[i]['second']['binary'] +')</td>'
                    + '<td>(Decimal: ' + response[i]['result']['result_dec'] + ' | Binario: ' + response[i]['result']['result_bin'] +')</td></tr>';
            }
            $('#operations-content').append(string);
        },
        error: function (jqxhr, status, exception) {
            
        }
    });
},
// TABLE CALC OPERATIONS
calculateTable = function () {
    var t1 = performance.now();
    $.ajax({
        type: "POST",
        url: "php/tableCalc.php",
        data: {
            number: $('#number').val(),
        },
        dataType: "json",
        success: function (response) {
            $('#info-calc').html("");
            var string = '';
            for(var i=0;i<response.length;i++) {
                string += '<tr>'
                    + '<td>' + i + '</td>'
                    + '<td> Decimal </td>'
                    + '<td>' + response[i]['value']['decimal'] + '</td>'
                    + '<td> x </td>'
                    + '<td>' + response[i]['multiple']['decimal'] + '</td>'
                    + '<td>' + response[i]['result']['decimal'] + '</td>'
                    + '</tr>';
                string += '<tr>'
                    + '<td>' + i + '</td>'
                    + '<td> Binário </td>'
                    + '<td>' + response[i]['value']['binary'] + '</td>'
                    + '<td> x </td>'
                    + '<td>' + response[i]['multiple']['binary'] + '</td>'
                    + '<td>' + response[i]['result']['binary'] + '</td>'
                    + '</tr>';
            }
            var t2 = performance.now();
            var time = (t2 - t1);
            var timeMsg = '<b>A operação levou: ' + time.toFixed(2) +'ms</b>';
            $('#table-calc-time').html(timeMsg)
            $('#info-calc').append(string);
            
        },
        error: function (jqxhr, status, exception) {

        }
    });
},
searchTable = function () {
    var t1 = performance.now();
    $.getJSON('./database/mult-operations.json', function (req) {
            $('#info-src').html("");
            var data = req[0];
            var field = $('#number').val()
            var string = '';
            for (var i = 0; i < data.length; i++) {
                if (data[i]['decimal']['numero'] == field) {
                    string += '<tr>'
                    + '<td> Decimal </td>'
                    + '<td>' + data[i]['decimal']['numero'] + '</td>'
                    + '<td> x </td>'
                    + '<td>' + data[i]['decimal']['multiplicador'] + '</td>'
                    + '<td>' + data[i]['decimal']['Resultado'] + '</td>'
                    + '</tr>';
                    string += '<tr>'
                        + '<td> Binário </td>'
                        + '<td>' + data[i]['binary']['numero'] + '</td>'
                        + '<td> x </td>'
                        + '<td>' + data[i]['binary']['multiplicador'] + '</td>'
                        + '<td>' + data[i]['binary']['Resultado'] + '</td>'
                        + '</tr>';
                }
            }
            var t2 = performance.now();
            var time = (t2 - t1);
            var timeMsg = '<b>A operação levou: ' + time.toFixed(2) + 'ms</b>';
            $('#table-src-time').html(timeMsg);
            $('#info-src').append(string);
    });
}   

    clearTableCalc = function () {
        $('#clear-mult-json').on('click', function(e) {
            e.preventDefault();
            $('#info-src').html("");
            $('#info-calc').html("");
            $('#table-src-time').html("");
            $('#table-calc-time').html("")
            $('#number').val("");
        });
    }
$(document).ready( function () {
    clearTableCalc();
    // FORMULÁRIO DE CONVERSÃO
    $('#convert-form').submit( function (e) {
        e.preventDefault();
        if ($('#dec').val() !== '') {
            loadAjax();
            searchBinaryInJson();
            $('#send').prop('disabled', true);
        } else {
            alert("Campo Obrigatório!");
        } 
    });
    // FORMULÁRIO DE OPERAÇÕES
    $('#operation-form').submit( function (e) {
        e.preventDefault();
        if ($('#first-num').val() !== '' && $('#second-num').val() !== '') {
            calculateAjax();
        } else {
            alert("Campo Obrigatório!")
        }
    });
    // FORMULÁRIO DE TABUADA
    $('#table-form').submit( function (e) {
        e.preventDefault();
        if ($('#number').val() !== '') {
            calculateTable() 
            searchTable();
        } else {
            alert("Campo Obrigatório!");
        }
    });
    $('#clear-json').click( function (e) {
        e.preventDefault();
        clearConverterJson();
        clearAllContent();
    });
    writeAjax();
});
