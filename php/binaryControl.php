<?php
    // $data = $_POST['formData'];

    calculateBinary(decbin(20), decbin(7));
    // convertDecimalToBinary($data);

    function convertDecimalToBinary($data) {
        $dec = $data;
        $bin = decbin($data);
        saveBinary($dec, $bin);
    }

    function saveBinary($dec, $bin) {
        $data[] = [
            "decimal" => $dec, "binary" => $bin
        ];
        $fp = file_get_contents('./../database/data.json');
        $tempArray = json_decode($fp);
        $tempArray[] = $data;
        $jsonData = json_encode($tempArray);
        file_put_contents('./../database/data.json', $jsonData);
    }
    
    function calculateBinary($fBin, $sBin) {
        $rSum = bindec($fBin) + bindec($sBin);
        $rSub = bindec($fBin) - bindec($sBin);
        $rDiv = bindec($fBin) / bindec($sBin);
        $rMul = bindec($fBin) * bindec($sBin);

        $data[] = [
            "Sum" => [
                "firstNumber" => $fBin,
                "secondNumber" => $sBin,
                "result" => decbin($rSum)
            ], 
            "Sub" => [
                "firstNumber" => $fBin,
                "secondNumber" => $sBin,
                "total" => decbin($rSub)
            ],
            "Div" => [
                "firstNumber" => $fBin,
                "secondNumber" => $sBin,
                "total" => decbin($rDiv)
            ],
            "Mul" => [
                "firstNumber" => $fBin,
                "secondNumber" => $sBin,
                "total" => decbin($rMul)
            ]
        ];

        echo json_encode($data);
    }
