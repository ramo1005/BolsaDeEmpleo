<?php

require_once '../../../Empleos/Empleador/empleadorService.php';
require_once '../../../Database/conect.php';

$conect = new Conect();
$item = new EmpleadorService($conect->db);

$data = $item ->CountEmpleos();
$result= array();
if($data->num_rows>0){
    while($row = $data->fetch_assoc()) {
        #clar the path from database
        if(!empty( $row['logo'])){
            $row['logo']=str_replace('\\','/',$row['logo']);
            $row['logo']=str_replace('C:/xampp/htdocs/','http://'.$_SERVER['SERVER_NAME'].'/',$row['logo']);
            $row['logo']=str_replace('#','%23',$row['logo']); 
        }
        else{
            $row['logo']=str_replace('\\','/',realpath('img/logos/default.jpg'));
            $row['logo']=str_replace('C:/xampp/htdocs/','http://'.$_SERVER['SERVER_NAME'].'/',$row['logo']);
        }
       
        array_push($result, $row);

    }
    echo json_encode($result);

}
else {
    echo json_encode(array('message'=>'No hay Vacantes'));
}

?>