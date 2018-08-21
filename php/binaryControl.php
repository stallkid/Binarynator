<?php
    // $data = $_POST['formData'];
    // multOpSeed();
    // binarySeed();
    calculateBinary(decbin(20), decbin(7));
    // convertDecimalToBinary($data);
    
    /**
     * Converte Decimal para Binário e salva em JSON
     *
     * @param [array] $data
     * @return void
     */
    function convertDecimalToBinary($data) {
        $dec = $data;
        $bin = decbin($data);
        $data[] = [
            "decimal" => $dec, "binary" => $bin
        ];
        saveToJson($data, 'converter');
    }
    /**
     * Salva o array em JSON
     *
     * @param [array] $value
     * @param [string] $database
     * @return void
     */
    function saveToJson($value, $database) {
        
        $fp = file_get_contents('./../database/'.$database.'.json');
        $tempArray = json_decode($fp);
        $tempArray[] = $value;
        $jsonData = json_encode($tempArray);
        file_put_contents('./../database/'.$database.'.json', $jsonData);
    }

    function toJson($value) {
        echo json_encode($value);
    }

    function dd($value) {
        var_dump($value);
    }
