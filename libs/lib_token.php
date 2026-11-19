<?php

function base64url_encode($data){
    $b64 = base64_encode($data);

    if($b64 === false){
        return false;
    }

    $url = strtr($b64, '+/', '-_');

    return rtrim($url,'=');
}

function base64url_decode($data, $strict = false){
    $b64 = strtr($data, '-_', '+/');

    return base64_decode($b64, $strict);
}

function makeJWT($header,$payload,$cle_secrete){
    $header64 = base64url_encode(json_encode($header));
    $payload64 = base64url_encode(json_encode($payload));
    $signature = base64url_encode(hash_hmac("sha256",$header64.".".$payload64,$cle_secrete,true));

    return $header64.".".$payload64.".".$signature;
}

function getPayloadJWT($jwt){
    $tokenParts = explode(".",$jwt);

    $payload = $tokenParts[1];

    return  json_decode(base64url_decode($payload));
}

function checkJWT($jwt){

    $regex = "/(([A-Za-z0-9+\/!=]+)\.){2}(?2)/";

    if(preg_match($regex,$jwt) === 1){
        
        $tokenParts = explode(".",$jwt);

        $data = $tokenParts[0].".".$tokenParts[1];

        $hashWithSecret = hash_hmac("sha256",$data,"caca",true);

        $hashWithSecret_encode64 = base64url_encode($hashWithSecret);

        return hash_equals($tokenParts[2],$hashWithSecret_encode64);
    }

}

?>