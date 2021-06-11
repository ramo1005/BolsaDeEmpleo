<?php
    require_once 'adminService.php';
    require_once '../../Database/conect.php';
    
    $conn = new Conect();

    $admin = new AdminService($conn->db);


    if(isset($_POST['limitJobs'])){
        $admin->ChangeLimitJobs($_POST['limitJobs']);
    }

?>