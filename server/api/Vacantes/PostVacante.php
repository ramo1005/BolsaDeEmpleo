<?php

require_once '../../../Empleos/Empleador/empleadorService.php';
require_once '../../../Database/conect.php';
require_once '../../../Empleos/Empleador/Empleo.php';

$conect = new Conect();
$item = new EmpleadorService($conect->db);


if($_SERVER['REQUEST_METHOD']=='POST'){
    $postBody= file_get_contents('php://input');

    $_POST=(json_decode($postBody,true));
    $idEmpleador=$item->GetEmpleadorApi($_POST['api_token']);

    if(isset($_POST['api_token'])){
        if($idEmpleador!=0){
            if(isset($_POST['name'])&&isset($_POST['company'])&& isset($_POST['type'])&&isset($_POST['category'])&&
            isset($_POST['position'])&&isset($_POST['url'])&& isset($_POST['email'])&&isset($_POST['location'])&&
            isset($_POST['description'])&&isset($_POST['status'])){

                $empleo = new Empleo($_POST['name'],$_POST['company'],$_POST['type'],$_POST['category'],$_POST['position'],$_POST['location'],$_POST['url'],'',$_POST['email'],$_POST['status'],$_POST['description'],$idEmpleador);
                $item->InsertEmpleo($empleo);

                echo json_encode(array('message'=>'Registro correcto'));


            }
            else{
                echo json_encode(array('message'=>'informacion invalida'));

            }

        }
        else{
            echo json_encode(array('message'=>'Token invalido'));

        }
    }
    else{
        echo json_encode(array('message'=>'Ingrese su token'));
    }


}
else{

    echo json_encode(array('message'=>'Postee su vacante'));

}


?>