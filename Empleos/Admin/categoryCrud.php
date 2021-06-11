<?php
    require_once 'adminService.php';
    require_once '../../Database/conect.php';
    
    $conn = new Conect();

    $admin = new AdminService($conn->db);


    if(isset($_POST['nameAdd'])){
        $admin->AddCategory($_POST['nameAdd']);
    }
    if(isset($_POST['nameRelease'])&&isset($_POST['idRelease'])){
        $admin->ReleaseCategory($_POST['nameRelease'],$_POST['idRelease']);
    }
    if(isset($_POST['idDelete'])){
        $admin->DeleteCategory($_POST['idDelete']);
    }
?>