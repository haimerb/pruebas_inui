<?php
require_once 'paciente.php';
include '../model/paciente.php';
include '../model/db.php';

header("Access-Control-Allow-Origin: *");


/**
 * Api base
 * Metodos: POST, PUT, GET etc
 * 
 */


/**
 * @author 
 * 
 * 
 */

$metodo = $_SERVER['REQUEST_METHOD'];
$urlRequest = $_SERVER['REQUEST_URI'];
$pathInfo = $_SERVER['PATH_INFO'];


$pacienteObj = new Paciente();
    $dbObj = new Db();


/**
 * Implementacion metodo get y sus funciones
 */
if ($metodo == 'GET') {
    //implementar el metodo GET aqui
    echo "Metodo GET ";
    

    /**
     * Encaminador de peticiones
     */
    if ($pathInfo == '/pacientes') {
        echo 'Peticion Get para listar pacientes por el path /pacientes';
        $dbObj->conection;
        print_r($pacienteObj->getPacientes());
    } else {
        print_r('Peticion GET hacia el path /paciente errada');
    }

}

/**
 * Implementacion metodo POST y sus funciones
 */
if ($metodo == 'POST') {
    //implementar el metodo POST aqui
    echo "Metodo POST ";
    if ($pathInfo == '/crearpaciente') {
        echo 'Peticion POST para crear un paciente por el path /crearpaciente';
        $dbObj->conection;

        $id = $pacienteObj->save($_POST);
		$result = $pacienteObj->getPacienteById($id);
		$_GET["response"] = true;
        print_r( $result);
    } else {
        print_r('Peticion POST hacia el path /crearpaciente errada');
    }

}

if ($metodo == 'PUT') {
    //implementar el metodo PUT aqui
}

if ($metodo == 'DELETE') {
    //implementar el metodo DELETE aqui
}


?>