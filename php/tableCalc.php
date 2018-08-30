<?php

$val = $_POST['number'];

calcTable($val);

function calcTable($val) {
    $data = [];
    for ($i=0; $i < 11; $i++) { 
        $result = $val * $i;
        $data[] = [
            'value' => [
                'decimal' => $val,
                'binary' => decbin($val)
            ],
            'multiple' => [
                'decimal' => $i,
                'binary' => decbin($i)
            ],
            'result' => [
                'decimal' => $result,
                'binary' => decbin($result)
            ]
        ];
    }
    echo json_encode($data);
}