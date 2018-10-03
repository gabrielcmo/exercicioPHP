<?php

function DB_Connect(){
    $PDO = new PDO('mysql:host=' .  DB_HOST . ';dbname=' . DB_NAME . ';charset=' . DB_CHARSET, DB_USER, DB_PASS);
    return $PDO;
}

function imageFile($img, $update){
    
    // Apagando imagem antiga caso estivesse dando update

    // if(!empty($update)){
    //     unlink( "image/$update");
    // }

    $extensao = strtolower(substr($img["name"], -4));
    $novoNome = md5(time());
    $diretorio = "image/";
    
    move_uploaded_file($img["tmp_name"], $diretorio.$novoNome);
    
    return $novoNome;
}

function dateConvert($date){
    if(!strstr($date, "/")){

        sscanf($date, "%d-%d-%d", $y, $m, $d);
        return sprintf('%02d/%02d/%04d', $d, $m, $y);
    }

    return false;
}