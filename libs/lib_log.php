<?php

function addLog($message, $type){
    $autorizedType = ["DEBUG", "INFO", "WARN", "DANGER"];
    
    foreach($autorizedType as $aType){
        if($aType == strtoupper($type)){
            $log = "\n[$aType] - ".date("Y-m-d H:i:s").": $message;";
            file_put_contents("./logs/".strtolower($aType)."/log_".date("Y-m-d").".log", $log, FILE_APPEND);
        }
    }
}