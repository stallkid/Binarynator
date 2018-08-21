<?php    
    
    /**
     * Realiza as opearações de dois numero em decimal e binário
     *
     * @param [integer] $fBin
     * @param [integer] $sBin
     * @return array
     */
    function calculateBinary($fBin, $sBin) {
        $rSum = bindec($fBin) + bindec($sBin);
        $rSub = bindec($fBin) - bindec($sBin);
        $rDiv = bindec($fBin) / bindec($sBin);
        $rMul = bindec($fBin) * bindec($sBin);

        $sum[] = [
            "decimal" => [
                "firstNumber" => bindec($fBin),
                "secondNumber" => bindec($sBin),
                "result" => $rSum
            ],
            "binario" => [
                "firstNumber" => decbin($fBin),
                "secondNumber" => decbin($sBin),
                "result" => decbin($rSum)
            ]
        ];
        $sub[] = [
            "decimal" => [
                "firstNumber" => bindec($fBin),
                "secondNumber" => bindec($sBin),
                "total" => $rSub
            ],
            "binario" => [
                "firstNumber" => decbin($fBin),
                "secondNumber" => decbin($sBin),
                "total" => decbin($rSub)
            ]
        ];
        $div[] = [
            "decimal" => [
                "firstNumber" => bindec($fBin),
                "secondNumber" => bindec($sBin),
                "total" => $rDiv
            ],
            "binario" => [
                "firstNumber" => decbin($fBin),
                "secondNumber" => decbin($sBin),
                "total" => decbin($rDiv)
            ]
        ];
        $mult[] = [
            "decimal" => [
                "firstNumber" => bindec($fBin),
                "secondNumber" => bindec($sBin),
                "total" => $rMul
            ],
            "binario" => [
                "firstNumber" => decbin($fBin),
                "secondNumber" => decbin($sBin),
                "total" => decbin($rMul)
            ]
        ];
        $data[] = [
            "Soma" => $sum,
            "Subtrai" => $sub,
            "Divide" => $div,
            "Multiplica" => $mult
        ];
        dd($data);
        saveToJson($data, 'all-operations');
        // return $data;
    }
    /**
     * Somar de dois numeros em binario e decimal
     *
     * @param [int] $fBin
     * @param [int] $sBin
     * @return array
     */
    function sumBinary($fBin, $sBin) {
        $rSum = bindec($fBin) + bindec($sBin);
        $data[] = [
            "decimal" => [
                "firstNumber" => bindec($fBin),
                "secondNumber" => bindec($sBin),
                "result" => $rSum
            ],
            "binario" => [
                "firstNumber" => decbin($fBin),
                "secondNumber" => decbin($sBin),
                "result" => decbin($rSum)
            ]
        ];
        return $data;
    }
    /**
     * Subtração de dois numeros em binario e decimal
     *
     * @param [int] $fBin
     * @param [int] $sBin
     * @return array
     */
    function subBinary($fBin, $sBin) {
        $rSub = bindec($fBin) - bindec($sBin);
        $data[] = [
            "decimal" => [
                "firstNumber" => bindec($fBin),
                "secondNumber" => bindec($sBin),
                "total" => $rSub
            ],
            "binario" => [
                "firstNumber" => decbin($fBin),
                "secondNumber" => decbin($sBin),
                "total" => decbin($rSub)
            ]
        ];
        return $data;
    }
    /**
     * Divisão de dois numeros em binario e decimal
     *
     * @param [int] $fBin
     * @param [int] $sBin
     * @return array
     */
    function divBinary($fBin, $sBin) {
        $rDiv = bindec($fBin) / bindec($sBin);
        $data[] = [
            "decimal" => [
                "firstNumber" => bindec($fBin),
                "secondNumber" => bindec($sBin),
                "total" => $rDiv
            ],
            "binario" => [
                "firstNumber" => decbin($fBin),
                "secondNumber" => decbin($sBin),
                "total" => decbin($rDiv)
            ]
        ];
        return $data;
    }
    /**
     * Multiplicação de dois numeros em binario e decimal
     *
     * @param [int] $fBin
     * @param [int] $sBin
     * @return array
     */
    function multBinary($fBin, $sBin) {
        $rMul = bindec($fBin) * bindec($sBin);
        $data[] = [
            "decimal" => [
                "firstNumber" => bindec($fBin),
                "secondNumber" => bindec($sBin),
                "total" => $rMul
            ],
            "binario" => [
                "firstNumber" => decbin($fBin),
                "secondNumber" => decbin($sBin),
                "total" => decbin($rMul)
            ]
        ];
        return $data;
    }
