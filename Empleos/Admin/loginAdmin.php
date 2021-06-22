<?php 
    require_once 'adminService.php';
    require_once 'Database/conect.php';

    $conect =new Conect();
    $admin = new AdminService($conect->db);

    session_start();


    if(isset($_POST['userAdmin'])&&isset($_POST['passwordAdmin'])){
        $check=$admin->CheckAdmin($_POST['userAdmin']);

        if($check->num_rows==1){
            while($row = $check->fetch_assoc()){
                if(password_verify($_POST['passwordAdmin'],$row['password'])){
                    $_SESSION['admin']='true';
                    $_SESSION['adminLogin']=$row['id'];
                    echo '1'; 
                }
                else{
                    echo '0';

                }
            }
        }
        else{
            echo '0';
        }
        
    }
?>