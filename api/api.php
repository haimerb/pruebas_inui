<?php
include '../model/paciente.php';
include '../model/db.php';

header("Access-Control-Allow-Origin: *");
header('Content-Type: application/json; charset=utf-8');

ini_set('memory_limit', '2000M');
/**
 * Api base
 * Metodos: POST, PUT, GET etc
 * 
 */


/**
 * @author Haymer Barbeti
 * 
 * 
 */

$metodo = $_SERVER['REQUEST_METHOD'];
$urlRequest = $_SERVER['REQUEST_URI'];
$pathInfo = $_SERVER['PATH_INFO'];


$pacienteObj = new Paciente();
    $dbObj = new Db();

    $id = $tipo_id = $nombre= $apellido= $telefono= $email= $genero="";

/**
 * Implementacion metodo get y sus funciones
 */
if ($metodo == 'GET') {
    /**
     * Encaminador de peticiones
     */
    if ($pathInfo == '/pacientes') 
    {
        /**
         * 
         * Peticion Get para listar pacientes por el path /pacientes
         */
        $dbObj->conection;
        
        $objArraySalida=$pacienteObj->getPacientes();

        $arraySalida=array();

        $objTratamiento=new Paciente();

        $count=0;
        foreach ($objArraySalida as $val) {
            
            $id=$val['id'];
            $tipo_id=$val['tipo_id'];
            $nombre=$val['nombre'];
            $apellido=$val['apellido'];
            $telefono=$val['telefono'];
            $email=$val['email'];
            $genero=$val['genero'];

         

            if($val['id']!=null&&$val['id']!=""){
                //print_r( $val['id'] ." <br>");
                array_push($arraySalida, array("id"=>$id,
                                            "tipo_id"=>$tipo_id,
                                            "nombre"=>$nombre,
                                            "apellido"=>$apellido,
                                            "telefono"=>$telefono,
                                            "email"=>$email,
                                            "genero"=>$genero)
                        );
            }
            

            $count+=$count+1;
        }

        print_r ( json_encode($arraySalida));
        

    }elseif($pathInfo == '/pacienteby')
    {
        //echo ' Peticion Get para listar pacienteby por el path /pacienteby';
        $dbObj->conection;
        //$result=new Paciente();
        $result =$pacienteObj->getPacienteById($_GET['id']);
        $_GET["response"] = true;
        
        $id=$result['id'];
        $tipo_id=$result['tipo_id'];
        $nombre=$result['nombre'];
        $apellido=$result['apellido'];
        $telefono=$result['telefono'];
        $email=$result['email'];
        $genero=$result['genero'];

        $objSalida=array("id"=>$id,
                         "tipo_id"=>$tipo_id,
                         "nombre"=>$nombre,
                         "apellido"=>$apellido,
                         "telefono"=>$telefono,
                         "email"=>$email,
                         "genero"=>$genero);

        print_r ( json_encode($objSalida));

    }else {
        print_r(' Peticion GET hacia el path /paciente errada');
    }

}

/**
 * Implementacion metodo POST y sus funciones
 */
if ($metodo == 'POST') {
    //implementar el metodo POST aqui
    //echo "Metodo POST ";
    
    if ($pathInfo == '/crearpaciente') {
        //echo 'Peticion POST para crear un paciente por el path /crearpaciente';
        $dbObj->conection;
        //++++++print_r($_POST['id']);

        $data=array("id"=>$_REQUEST['id'],
                    "tipo_id"=>$_REQUEST['tipo_id'],
                    "nombre"=>$_REQUEST['nombre'],
                    "apellido"=>$_REQUEST['apellido'],
                    "telefono"=>$_REQUEST['telefono'],
                    "email"=>$_REQUEST['email'],
                    "genero"=>$_REQUEST['genero']);

        print_r( $data);
        //$id = $pacienteObj->save($_POST);
        $id = $pacienteObj->save($data);
		$result = $pacienteObj->getPacienteById($id);
		$_GET["response"] = true;
        print_r (json_encode($result));

    } elseif($pathInfo == '/editarpaciente')
    {
        $dbObj->conection;
        
        $data=array("id"=>$_REQUEST['id'],
                    "tipo_id"=>$_REQUEST['tipo_id'],
                    "nombre"=>$_REQUEST['nombre'],
                    "apellido"=>$_REQUEST['apellido'],
                    "telefono"=>$_REQUEST['telefono'],
                    "email"=>$_REQUEST['email'],
                    "genero"=>$_REQUEST['genero']);

        $id = $pacienteObj->save($data);
		$result = $pacienteObj->getPacienteById($id);
		$_GET["response"] = true;
        print_r(json_encode($result)) ;

    } elseif($pathInfo == '/eliminarpacienteby')
    {
            $dbObj->conection;
            $result=$pacienteObj->deletePacienteById($_REQUEST['id']);
            echo 'ingresa a DELETE '.$result;
            $_GET["response"] = true;
            print_r (json_encode($result));

    }
    else 
    {
        print_r('Peticion POST hacia los paths establecidos para el metodo POST erradios');
    }

}

/**
 * Implementacion metodo PUT y sus funciones
 */
if ($metodo == 'PUT') {
    //implementar el metodo PUT aqui
}

/**
 * Implementacion metodo DELETE y sus funciones
 */
if ($metodo == 'DELETE') {
    //implementar el metodo DELETE aqui
    //echo 'ingresa a DELETE';
    if ($pathInfo == '/eliminarpacienteby') 
    {
        //echo 'ingresa a DELETE';
        $dbObj->conection;
        $result=$pacienteObj->deletePacienteById($_REQUEST['id']);
        echo 'ingresa a DELETE '.$result;
        $_GET["response"] = true;
        print_r (json_encode($result));
    }
}


?>