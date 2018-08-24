<?php 

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
        "result_dec" => $result,
        "result_bin" => decbin($result)
    ];
    return $data;
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
