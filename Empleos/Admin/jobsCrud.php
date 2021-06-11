<?php
    require_once 'adminService.php';
    require_once '../../Database/conect.php';
    
    $conn = new Conect();

    $admin = new AdminService($conn->db);


    if(isset($_POST['idRelease'])&&isset($_POST['name'])&&isset($_POST['company'])&&isset($_POST['type'])
    &&isset($_POST['category'])&&isset($_POST['position'])&&isset($_POST['location'])&&isset($_POST['url'])
    &&isset($_POST['email'])&&isset($_POST['status'])&&isset($_POST['description'])){

        $admin->ReleasePhotoJob();
        $admin->ReleaseJob();

    }
    if(isset($_POST['idDelete'])){
        $admin->DeleteJob($_POST['idDelete']);
    }
?>