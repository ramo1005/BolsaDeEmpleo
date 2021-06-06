<?php
require_once '../../layout/layout.php';
require_once '../../layout/menu.php';
include 'createEmpleo.php';

$layout = new Layout(false);
$menu = new Menu();
session_start();

if (!isset($_SESSION['empleador'])){
    header('Location: ../../index.php');
}


?>

<?php echo $layout->printHeader();?>

    <center id="empleadorOption">
        <div class="card-body">
            <button id="btn-login-back" type="button" class="btn btn-dark  " style="display:none;" onclick="BackLoginPanel()">Volver</button>

            <button type="button" class="btn btn-dark"onclick="AddJobEmpleador()">Agregar Puesto </button>            
            <button type="button" class="btn btn-warning"onclick="ShowJobsEmpleador()">Listar Puestos Agregados</button>   
            <button type="button" class="btn btn-danger float-end"onclick="ExitEmpleador()">Salir</button>     
        </div>
    </center>

    

<?php echo $layout->printFooter(); include 'addEmpleador.php';?>
