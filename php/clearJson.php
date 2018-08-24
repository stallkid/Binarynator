<?php

clearJson();

function clearJson($value, $database) {
        $fp = file_get_contents('./../database/'.$database.'.json');
        $tempArray = json_decode($fp);
        $tempArray[] = [];
        $jsonData = json_encode($tempArray);
        file_put_contents('./../database/'.$database.'.json', $jsonData);
    }