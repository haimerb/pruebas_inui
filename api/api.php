<?php


header("Access-Control-Allow-Origin: *");

/**
 * Api base
 * Metodos: POST, PUT, GET etc
 * 
 */




//$protocol = stripos($_SERVER['SERVER_PROTOCOL'],'https') === true ? 'https://' : 'http://';

//$domain = $_SERVER['HTTP_HOST'];

//echo $domain;

/**
 * @author 
 * 
 * 
 */

$metodo=$_SERVER['REQUEST_METHOD'];

if($metodo=='GET'){
    //implementar el metodo GET aqui
    echo "Metodo GET ";
}

if($metodo=='POST'){
    //implementar el metodo POST aqui
    echo "Metodo POST ";
}

if($metodo=='PUT'){
    //implementar el metodo PUT aqui
}

if($metodo=='DELETE'){
    //implementar el metodo DELETE aqui
}


 ?>