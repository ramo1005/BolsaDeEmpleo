<?php
    require_once 'Empleo.php';
    require_once 'empleadorService.php';
    require_once '../../Database/conect.php';

    $conect = new Conect();
    $item = new EmpleadorService($conect->db);


    
    if(isset($_POST['name'])&&isset($_POST['company'])&& isset($_POST['type'])&&isset($_POST['category'])&&
    isset($_POST['position'])&&isset($_POST['location'])&& isset($_POST['url'])&&isset($_POST['status'])&&
    isset($_POST['email'])&&isset($_POST['description'])&& isset($_POST['idEmpleador'])){

        $item->getEmpleoPhoto();
        $empleo = new Empleo($_POST['name'],$_POST['company'],$_POST['type'],$_POST['category'],$_POST['position'],$_POST['location'],$_POST['url'],$_POST['realpath'],$_POST['email'],$_POST['status'],$_POST['description'],$_POST['idEmpleador']);
        $item->InsertEmpleo($empleo);
        
    }

?>