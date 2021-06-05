<?php 
    require_once 'adminService.php';
    require_once 'Database/conect.php';

    $conect =new Conect();
    $admin = new AdminService($conect->db);

    session_start();


    if(isset($_POST['userAdmin'])&&isset($_POST['passwordAdmin'])){
        $check=$admin->CheckAdmin($_POST['userAdmin'],$_POST['passwordAdmin']);

        if($check->num_rows==1){
            $_SESSION['admin']='true';
            echo '1';
        }
        else{
            echo '0';
        }
        
    }
?>