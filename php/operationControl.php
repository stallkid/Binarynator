<?php 

$n1 = $_POST['firstNumber'];
$n2 = $_POST['secondNumber'];
$op = $_POST['operator'];

switch ($op) {
    case '+':
        sumOperation($n1, $n2);
        break;
    
    case '-':
        minusOperation($n1, $n2);
        break;

    case '/':
        divOperation($n1, $n2);
        break;

    case '*':
        multOperation($n1, $n2);
        break;
    
    default:
        sumOperation($n1, $n2);
        break;
}


function data($first, $second, $op, $result) {
    $data = [];
    $data[] = [
        "first" => [
            "decimal" => $first,
            "binary" => decbin($first)
        ],
        "operation" => $op,
        "second" => [
            "decimal" => $second,
            "binary" => decbin($second)
        ],
        "result" => [
            "result_dec" => $result,
            "result_bin" => decbin($result)
        ]
    ];

    echo json_encode($data);
}

function sumOperation($a, $b) {
    $c = $a + $b;
    $op = '+';
    $data = data($a,$b, $op, $c);
    return $data;
}

function minusOperation($a, $b) {
    $c = $a - $b;
    $op = '-';
    $data = data($a, $b, $op, $c);
    return $data;
}

function divOperation($a, $b) {
    $c = $a / $b;
    $op = '/';
    $data = data($a, $b, $op, $c);
    return $data;
}

function multOperation($a, $b) {
    $c = $a * $b;
    $op = '*';
    $data = data($a, $b, $op, $c);
    return $data;
}
