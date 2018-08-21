<?php

    /**
     * Seed de multiplicadores decimais e binários até 10
     *
     * @return void
     */
    function multOpSeed() {
        $data = [];
        $ope = [1,2,3,4,5,6,7,8,9,10];
        foreach ($ope as $mult) {
            for ($i=0; $i < 11; $i++) { 
                $result = $mult * $i;
                $decimal[] = [
                        "numero" => $mult,
                        "multiplicador" => $i,
                        "Resultado" => $result,
                    ];
                $binary[] = [
                        "numero" => decbin($mult),
                        "multiplicador" => decbin($i),
                        "Resultado" => decbin($result),
                    ];
            }
        }
        $data[] = [
            "decimal" => $decimal,
            "binario" => $binary
        ];
        // print_r($data);
        echo json_encode($data);
        saveToJson($data ,'mult-operations');   
    }

     /**
     * Faz o seed de numeros binários
     *
     * @return void
     */
    function binarySeed() {
        $data = [];
        for ($i=0; $i < 1000; $i++) { 
            $data[] = [
                "Decimal" => $i,
                "Binary" => decbin($i)
            ];
        }
        echo json_encode($data);
        saveToJson($data);
    }
    