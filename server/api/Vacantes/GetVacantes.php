<?php

require_once '../../../Empleos/Empleador/empleadorService.php';
require_once '../../../Database/conect.php';

$conect = new Conect();
$item = new EmpleadorService($conect->db);

$data = $item ->CountEmpleos();
$result= array();
if($data->num_rows>0){
    while($row = $data->fetch_assoc()) {
        array_push($result, $row);

    }
    echo json_encode($result);

}
else {
    echo json_encode(array('message'=>'No hay Vacantes'));
}

?>