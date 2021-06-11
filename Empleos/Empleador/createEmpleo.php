<?php
    require_once 'Empleo.php';
    require_once 'ApplyJob.php';

    require_once 'empleadorService.php';
    require_once '../../Database/conect.php';

    $conect = new Conect();
    $item = new EmpleadorService($conect->db);

    if(isset($_POST['name'])&&isset($_POST['company'])&& isset($_POST['type'])&&isset($_POST['category'])&&
    isset($_POST['position'])&&isset($_POST['location'])&& isset($_POST['url'])&&isset($_POST['status'])&&
    isset($_POST['email'])&&isset($_POST['description'])&& isset($_POST['idEmpleador'])){

        $empleo = new Empleo($_POST['name'],$_POST['company'],$_POST['type'],$_POST['category'],$_POST['position'],$_POST['location'],$_POST['url'],'...',$_POST['email'],$_POST['status'],$_POST['description'],$_POST['idEmpleador']);
        $item->InsertEmpleo($empleo);
        $item->getEmpleoPhoto();
        $item->RefreshPathPhoto();


        
    }
    if(isset($_POST['nameJob'])&&isset($_POST['lastname'])&& isset($_POST['gender'])&&isset($_POST['location'])&&
    isset($_POST['url'])&&isset($_GET['jobId'])&& isset($_GET['empleadorId'])&&isset($_POST['email'])&&isset($_POST['description'])){

        $applyJob = new ApplyJob($_POST['nameJob'],$_POST['lastname'],$_POST['gender'],$_POST['location'],$_POST['url'],$_POST['realpath'],$_POST['email'],$_POST['description'],$_GET['empleadorId'],$_GET['jobId']);
        $item->InsertApplyJob($applyJob);
        $item->getApplyJobFile();
        $item->RefreshPathCurriculum();


        
    }

?>