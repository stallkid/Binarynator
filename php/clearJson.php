<?php

$database = $_POST['database'];

clearJson($database);

function clearJson($database) {
        $fp = fopen('./../database/'.$database.'.json', 'w');
        $txt = "[\n]";
        fwrite($fp,$txt);
        rewind($fp);
        fclose($fp);
        clearstatcache();
        echo json_encode('success');
}
