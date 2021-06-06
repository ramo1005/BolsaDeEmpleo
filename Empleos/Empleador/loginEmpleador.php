<?php 
    require_once 'empleadorService.php';
    require_once 'Database/conect.php';
    require_once 'Empleador.php';

    $conect = new Conect();
    $empleadorService = new EmpleadorService($conect->db);

    if(isset($_POST['userEmpleador'])&&isset($_POST['passwordEmpleador'])){
        $check=$empleadorService->CheckEmpleador($_POST['userEmpleador'],$_POST['passwordEmpleador']);

        if($check->num_rows==1){
            while($row = $check->fetch_assoc()){
                $_SESSION['empleador']='true';
                $_SESSION['empleadorLogin']=$row['id'];
                echo '1';
            }
        }
        else{
            echo '0';
        }


    }

    if(isset($_POST['name'])&&isset($_POST['company'])&& isset($_POST['user'])&&isset($_POST['password'])){

        $empleador = new Empleador($_POST['name'],$_POST['company'],$_POST['user'],$_POST['password']);
        $empleadorService->InsertEmpleador($empleador);

        
    }

?>